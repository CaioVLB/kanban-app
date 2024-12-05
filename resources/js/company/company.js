export default () => ({
  companyId: null,
  companyName: null,
  isLoading: false,

  init() {
    this.companyId = null;
    this.isLoading = false;
  },

  openModal(companyId, companyName) {
    this.companyId = companyId;
    this.companyName = companyName;
    this.$dispatch('open-modal', 'modal-delete-company');
  }
})
