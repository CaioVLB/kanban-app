export default () => ({
  noteId: '',
  dateNote: '',
  isLoadingNoteAdd: false,
  isLoadingNoteDeletion: false,

  openModalDeleteNote(noteId, dateNote) {
    this.noteId = noteId;
    this.dateNote = dateNote;
    this.$dispatch('open-modal', 'delete-note-modal');
  },
});
