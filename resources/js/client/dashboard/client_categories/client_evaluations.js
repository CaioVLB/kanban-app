export default () => ({
  form: {
    evaluationName: ''
  },
  routes: {
    create: '',
    update: '',
    delete: '',
  },
  evaluationLabel: '',
  originEvaluationName: '',
  isLoadingEvaluationAdd: false,
  isLoadingDeletion: false,
  mode: 'create',

  openModalEvaluation(mode, clientId, type, label, evaluationId, evaluationName = '') {
    this.mode = mode;
    this.evaluationLabel = label;
    if (this.mode === 'edit') {
      this.routes.update = window.routes.evaluationList.update
        .replace(':client_id', clientId)
        .replace(':evaluation_id', evaluationId)
        .replace(':type', type)
      this.form.evaluationName = evaluationName;
    } else {
      this.routes.create = this.replaceRouteParams(window.routes.evaluationList.create, clientId, type);
      this.form.evaluationName = '';
    }
    this.$dispatch('open-modal', 'evaluation-create-modal');
  },

  openModalDeleteEvaluation(evaluationId, type, evaluationName) {
    this.routes.delete = this.replaceRouteParams(window.routes.evaluationList.delete, evaluationId, type);
    this.originEvaluationName = evaluationName;
    this.$dispatch('open-modal', 'evaluation-delete-modal');
  },

  replaceRouteParams(route, id, type) {
    return route.replace(':id', id).replace(':type', type);
  },
})
