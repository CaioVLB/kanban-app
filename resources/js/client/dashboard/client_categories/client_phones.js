export default () => ({
  phoneId: null,
  phoneNumber: null,
  isLoadingDeletion: false,

  init() {
    this.phoneId = null;
    this.isLoadingDeletion = false;
  },

  openModal(phoneId, phoneNumber) {
    this.phoneId = phoneId;
    this.phoneNumber = phoneNumber;
    this.$dispatch('open-modal', 'modal-delete-phone');
  }
})
