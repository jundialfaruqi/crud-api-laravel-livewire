<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
    <div class="toast rounded-4 shadow-sm" id="toast-notification" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header rounded-top-4">
            <span class="me-2" id="toast-avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-1">
                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                </svg>
            </span>
            <strong class="me-auto" id="toast-title">Berhasil!</strong>
            <small id="toast-time">Baru saja</small>
            <button type="button" class="btn-close" onclick="closeToast()" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast-message">
            ✅ Default message
        </div>
    </div>
</div>
