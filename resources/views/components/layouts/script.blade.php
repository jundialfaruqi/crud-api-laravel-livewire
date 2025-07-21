<script data-navigate-once src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"></script>
<script data-navigate-once>
    function showToast(title, message, time) {
        const toastElement = document.getElementById('toast-notification');
        const toastTitle = document.getElementById('toast-title');
        const toastMessage = document.getElementById('toast-message');
        const toastTime = document.getElementById('toast-time');

        // Set content
        toastTitle.textContent = title;
        toastMessage.innerHTML = `${message}`;
        toastTime.textContent = time;

        // Show toast with animation
        toastElement.style.display = 'block';
        toastElement.classList.add('show');

        // Auto hide after 5 seconds
        setTimeout(() => {
            toastElement.classList.remove('show');
            setTimeout(() => {
                toastElement.style.display = 'none';
            }, 300);
        }, 5000);
    }

    // Close toast function
    function closeToast() {
        const toastElement = document.getElementById('toast-notification');
        toastElement.classList.remove('show');
        setTimeout(() => {
            toastElement.style.display = 'none';
        }, 300);
    }

    document.addEventListener('livewire:init', () => {
        Livewire.on('show-toast', (event) => {
            const data = event[0];
            showToast(data.title, data.message, data.time);
        });
    });
</script>
