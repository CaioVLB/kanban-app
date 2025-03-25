export default () => ({
  cities: [],
  addressId: null,
  address: null,
  isLoadingDeletion: false,
  searching: false,

  init() {
    this.addressId = null;
    this.isLoadingDeletion = false;
    this.searching = false;
    this.cities = [];
  },

  openModal(element) {
    this.addressId = element.dataset.id;
    this.address = element.dataset.content;
    this.$dispatch('open-modal', 'modal-delete-address');
  },

  fetchCities(stateId) {
    if (!stateId) return;

    this.searching = true;

    axios.get(`/api/states/${stateId}/cities`)
      .then(response => {
        this.cities = response.data;
      })
      .catch(error => {
        console.error("Erro ao buscar cidades");
      })
      .finally(() => {
        this.searching = false;
      });
  }
});
