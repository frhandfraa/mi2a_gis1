// admin/assets/admin.js - opsional
document.addEventListener('DOMContentLoaded', function() {
  var toggles = document.querySelectorAll('.toggle-sidebar');
  toggles.forEach(function(t) {
    t.addEventListener('click', function() {
      document.body.classList.toggle('sidebar-hidden');
    });
  });
});
