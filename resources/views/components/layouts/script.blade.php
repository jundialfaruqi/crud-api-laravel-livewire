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

        // Show toast with smooth animation
        toastElement.style.display = 'block';
        // Small delay to ensure display is set before animation
        requestAnimationFrame(() => {
            toastElement.classList.add('show');
        });

        // Auto hide after 5 seconds with smooth animation
        setTimeout(() => {
            hideToast();
        }, 5000);
    }

    // Close toast function with smooth animation
    function closeToast() {
        hideToast();
    }

    // Hide toast with smooth animation
    function hideToast() {
        const toastElement = document.getElementById('toast-notification');
        toastElement.classList.remove('show');
        toastElement.classList.add('hide');
        
        setTimeout(() => {
            toastElement.style.display = 'none';
            toastElement.classList.remove('hide');
        }, 300);
    }

    document.addEventListener('livewire:init', () => {
        Livewire.on('show-toast', (event) => {
            const data = event[0];
            showToast(data.title, data.message, data.time);
        });
    });
</script>
