export default () => ({
  fileId: '',
  fileName: '',
  fileDescription: '',
  file: '',
  mimeType: '',
  isLoadingFile: false,
  errorLoadingFile: false,
  isUploadingFile: false,
  isLoadingFileDeletion: false,

  openModalUploadFile() {
    this.$dispatch('open-modal', 'files-modal');
  },

  openModalDeleteFile(fileId, fileName) {
    this.fileId = fileId;
    this.fileName = fileName;
    this.$dispatch('open-modal', 'delete-file-modal');
  },

  openModalViewFile(fileId, fileName, fileDescription) {
    this.fileName = fileName;
    this.fileDescription = fileDescription;
    this.$dispatch('open-modal', 'view-file-modal');
    this.fetchFile(fileId);
  },

  fetchFile(fileId) {
    this.isLoadingFile = true;
    this.errorLoadingFile = false;
    this.file = '';

    axios.get(`api/collaborator/files/${fileId}/view`)
      .then(response => {
        this.file = response.data.file;
        this.mimeType = response.data.mimeType;
      })
      .catch(error => {
        this.errorLoadingFile = true;
      })
      .finally(() => {
        this.isLoadingFile = false;
      });
  }
});
