<?php

namespace App\Traits;

trait ToastTrait
{
  public function showToast($type = 'success', $title = 'Berhasil!', $message = 'OK', $time = 'Baru saja')
  {
    return $this->dispatch('show-toast', [
      'type' => $type,
      'title' => $title,
      'message' => $message,
      'time' => $time
    ]);
  }
}
