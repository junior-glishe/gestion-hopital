<?php /** Toasts dynamiques — auto-dismiss 4s. */ ?>
<?php if (!empty($flash)): ?>
<div id="flash-zone" class="fixed top-6 right-6 z-[9999] space-y-3 max-w-sm">
  <?php foreach ($flash as $f):
      $type = $f['type'] ?? 'info';
      $bg   = $type === 'success' ? 'bg-green-600'
            : ($type === 'error'   ? 'bg-red-600'
            : ($type === 'warning' ? 'bg-amber-500' : 'bg-blue-600'));
      $icon = $type === 'success' ? '✓'
            : ($type === 'error'   ? '✕'
            : ($type === 'warning' ? '!' : 'i'));
  ?>
  <div data-flash class="<?= $bg ?> text-white px-5 py-4 rounded-xl shadow-2xl flex items-start gap-3 animate-flash-in">
    <span class="flex-shrink-0 w-7 h-7 rounded-full bg-white/20 flex items-center justify-center font-bold text-sm"><?= $icon ?></span>
    <span class="font-medium leading-snug flex-1"><?= htmlspecialchars($f['message'], ENT_QUOTES, 'UTF-8') ?></span>
    <button onclick="this.parentElement.remove()" class="flex-shrink-0 opacity-70 hover:opacity-100 text-lg leading-none">×</button>
  </div>
  <?php endforeach; ?>
</div>
<script>
  (function () {
    setTimeout(function () {
      document.querySelectorAll('[data-flash]').forEach(function (el) {
        el.style.transition = 'all .35s ease';
        el.style.opacity = '0';
        el.style.transform = 'translateX(120%)';
        setTimeout(function () { el.remove(); }, 400);
      });
    }, 4000);
  })();
</script>
<style>
@keyframes flash-in { from { opacity: 0; transform: translateX(120%); } to { opacity: 1; transform: translateX(0); } }
.animate-flash-in { animation: flash-in .35s ease-out; }
</style>
<?php endif; ?>
