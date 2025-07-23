document.addEventListener('alpine:init', () => {
  Alpine.data('blogLoop', blogLoop)
})

function blogLoop() {
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
      fetch('/wp-json/wp/v2/categories')
        .then(res => res.json())
        .then(data => {
          this.categories = data;
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

      fetch(`/wp-json/sputnik/v1/posts?${params.toString()}`)
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
      console.log('Active categories:', this.activeCategories)

      this.fetchPosts(true);
    },

    loadMore() {
      if (!this.hasMore) return;
      this.page += 1;
      this.fetchPosts(false);
    },
  }
}
