export default (isActiveCollaborator) => ({
  isActiveCollaborator: isActiveCollaborator,
  isActive: 'Desative esta opção se o colaborador não estiver mais ativo. Essa ação revogará o acesso dele ao sistema.',
  isInactive: 'Ative esta opção para o colaborador voltar a ter acesso ao sistema.',
  paragraph: '',
  isLoadingResetPassword: false,
  isLoadingModifyStatus: false,

  init() {
    this.paragraph = isActiveCollaborator ?  this.isActive : this.isInactive
  },

  modifyStatus (collaboratorId, originStatus) {
    if (!collaboratorId) return;

    this.isLoadingModifyStatus = true;

    axios.put(`/api/collaborator/${collaboratorId}/is_active`)
      .then(response => {
        const newStatus = response.data?.is_active;
        this.isActiveCollaborator = newStatus;
        this.paragraph = newStatus ? this.isActive : this.isInactive;
      })
      .catch(error => {
        document.getElementById(`is_active_collaborator_${collaboratorId}`).checked = originStatus;
      })
      .finally( () => {
        this.isLoadingModifyStatus = false;
      });
  }
})
