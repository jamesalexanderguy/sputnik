document.addEventListener('alpine:init', () => {
  Alpine.data('contentLoop', (apiEndpoint, taxonomyEndpoint) => {
    return {
      posts: [],
      page: 1,
      loading: false,
      search: '',
      categories: [],
      activeCategories: [],

      init() {
        this.fetchCategories();
        this.fetchPosts();
      },

      async fetchCategories() {
        if (!taxonomyEndpoint) return;
        try {
          const res = await fetch(taxonomyEndpoint);
          const data = await res.json();
          this.categories = Array.isArray(data) ? data : [];
        } catch (err) {
          console.error('Error in fetchCategories:', err);
          console.trace();
          this.categories = [];
        }
      },

      async fetchPosts(reset = true) {
        if (!apiEndpoint) return;

        if (reset) {
          this.page = 1;
          this.posts = [];
        }

        this.loading = true;

        try {
          const params = new URLSearchParams({
            page: this.page,
            search: this.search,
          });

          if (this.activeCategories.length > 0) {
            params.append('categories', this.activeCategories.join(','));
          }

          const res = await fetch(`${apiEndpoint}?${params.toString()}`);
          const data = await res.json();

          if (Array.isArray(data)) {
            // remove duplicates by id
            const uniquePosts = [];
            const ids = new Set();
            data.forEach(p => {
              if (!ids.has(p.id)) {
                ids.add(p.id);
                uniquePosts.push(p);
              }
            });
            this.posts = uniquePosts;
          } else {
            this.posts = [];
          }
        } catch (err) {
          console.error('Error in fetchPosts:', err);
          this.posts = [];
        } finally {
          this.loading = false;
        }
      },

      toggleCategory(catId) {
        if (this.activeCategories.includes(catId)) {
          this.activeCategories = this.activeCategories.filter(id => id !== catId);
        } else {
          this.activeCategories.push(catId);
        }
        this.fetchPosts(true);
      },
    };
  });
});
