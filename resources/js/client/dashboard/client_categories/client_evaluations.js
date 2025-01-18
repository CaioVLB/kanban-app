export default () => ({
  form: {
    evaluationName: ''
  },
  routes: {
    create: '',
  },
  evaluationLabel: '',
  isLoadingEvaluationAdd: false,

  openModalEvaluation(clientId, type, label) {
    this.routes.create = window.routes.evaluation.create
      .replace(':id', clientId)
      .replace(':type', type);
    this.evaluationLabel = label;
    this.$dispatch('open-modal', 'evaluation-create-modal');
  },
})
