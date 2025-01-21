export default (weight) => ({
  form: {
    weight: weight ?? '',
  },
  routes: {
    update: '',
    redirect: '',
  },
  isLoadingAction: false,

  submitEvaluation(evaluationId, type) {
    this.routes.update = this.replaceRouteParams(window.routes.evaluation.update, evaluationId, type);
  },

  openModalConfirmEvaluation(clientId) {
    this.routes.redirect = window.routes.evaluation.redirect.replace(':client_id', clientId);
    this.$dispatch('open-modal', 'confirm-action-modal');
  },

  replaceRouteParams(route, id, type) {
    return route.replace(':evaluation_id', id).replace(':type', type);
  },

  formatWeight(value) {
    value = value.replace(/[^0-9]/g, '');

    value = value.slice(0, 5);

    if (value.length >= 3) {
      const decimalIndex = value.length - 2;
      value = value.slice(0, decimalIndex) + '.' + value.slice(decimalIndex);
    }

    return value;
  }
})
