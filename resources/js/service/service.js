export default (categoryId) => ({
  form: {
    service: '',
    price: ''
  },
  routes: {
    create: window.routes.services.create.replace(':id', categoryId),
    update: '',
    delete: '',
  },
  originName: '',
  isLoadingServiceAdd: false,
  isLoadingServiceDeletion: false,
  isLoadingModifyStatus: false,
  mode: 'create',

  openModalService(mode, serviceId = null, serviceName = '', price= '') {
    this.mode = mode;
    if (this.mode === 'edit') {
      this.routes.update = window.routes.services.update.replace(':id', serviceId);
      this.form.service = serviceName;
      this.form.price = price;
      this.originName = serviceName;
    } else {
      this.form.service = '';
      this.form.price = '';
    }
    this.$dispatch('open-modal', 'service-modal');
  },

  openModalDeleteService(serviceId, serviceName) {
    this.routes.delete = window.routes.services.delete.replace(':id', serviceId);
    this.originName = serviceName;
    this.$dispatch('open-modal', 'delete-service-modal');
  },

  modifyStatus (serviceId, originStatus) {
    if (!serviceId) return;

    this.isLoadingModifyStatus = true;

    axios.put(`/api/service/${serviceId}/is_active`)
      .catch(error => {
        document.getElementById(`is_active_service_${serviceId}`).checked = originStatus;
      })
      .finally( () => {
        this.isLoadingModifyStatus = false;
      });
  },

  formatMoney (value) {
    value = value.replace(/\D/g, "");

    value = value.replace(/(\d)(\d{2})$/, "$1,$2");
    value = value.replace(/(?=(\d{3})+(\D))\B/g, ".");

    return value ? `R$ ${value}` : "";
  }
})
