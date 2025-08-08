document.addEventListener('alpine:init', () => {
  Alpine.data('contentLoop', (apiEndpoint, taxonomyEndpoint) => contentLoop(apiEndpoint, taxonomyEndpoint));
});

function contentLoop(apiEndpoint, taxonomyEndpoint) {
  return {
    posts: [],
    page: 1,
    hasMore: true,
    loading: false,
    search: '',
    categories: [],
    activeCategories: [],

    init() {
      this.fetchCategories();
      this.fetchPosts();
    },
    
    fetchCategories() {
      fetch(taxonomyEndpoint)
        .then(res => res.json())
        .then(data => {
          if (Array.isArray(data)) {
            this.categories = data;
          }
        })
        .catch(() => {
          this.categories = [];
        });
    },

    fetchPosts(reset = true) {
      if (reset) {
        this.page = 1;
        this.posts = [];
        this.hasMore = true;
      }

      this.loading = true;

      const params = new URLSearchParams({
        page: this.page,
        search: this.search,
      });

      if (this.activeCategories.length > 0) {
        params.append('categories', this.activeCategories.join(','));
      }

      fetch(`${apiEndpoint}?${params.toString()}`)
        .then(res => {
          if (!res.ok) this.hasMore = false;
          return res.json();
        })
        .then(data => {
          if (data.length === 0) this.hasMore = false;
          this.posts = [...this.posts, ...data];
        })
        .finally(() => {
          this.loading = false;
        });
    },

    toggleCategory(catId) {
      if (this.activeCategories.includes(catId)) {
        this.activeCategories = this.activeCategories.filter(id => id !== catId);
      } else {
        this.activeCategories.push(catId);
      }
      this.fetchPosts(true);
    },

    loadMore() {
      if (!this.hasMore) return;
      this.page += 1;
      this.fetchPosts(false);
    },
  }
}
