export default function modalComponent(id) {
    return {
        show: false,
        modalInstance: null,

        init() {

            window.addEventListener('open-modal', (e) => {
                if (e.detail === id) {
                    this.open();
                }
            });

            this.modalInstance = new bootstrap.Modal(document.getElementById(id));

            // Sincronizar apertura/cierre con Alpine
            this.$watch('show', (value) => {
                if (value) {
                    this.modalInstance.show();
                } else {
                    this.modalInstance.hide();
                }
            });

            // Cerrar modal al evento de Bootstrap
            document.getElementById(id).addEventListener('hide.bs.modal', () => {
                this.show = false;
            });
        },

        open() {
            this.show = true;
        },

        close() {
            this.show = false;
        }
    }
}
