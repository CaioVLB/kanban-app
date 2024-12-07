export default () => ({
  isLoading: false,

  init() {
    this.isLoading = false;
  },

  openModal() {
    this.$dispatch('open-modal', 'files-modal');
  }
})
