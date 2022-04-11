<x-modal-confirm
  livewireEventToOpenModal="delete-set-comment-done"
  modalTitle="Delete Comment"
  modalDescription="Are you sure you want to delete this comment? This action cannot be undone."
  modalConfirmButtonText="Delete"
  modalConfirmButtonColor="bg-v-red text-white focus:ring-red-500 hover:bg-red-600"
  wireClick="deleteComment"
/>