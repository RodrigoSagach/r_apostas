(function() {
  $(document).ready(function() {
    $('.tree-toggle').click(function() {
      return $(this).parent().children('ul.tree').toggle(200);
    });
    $('.delete-confirmation').confirmation({
      btnOkLabel: 'Apagar',
      btnCancelClass: 'Cancelar',
      singleton: true,
      popout: true,
      title: 'Você tem Certeza?',
      placement: 'top'
    });
    $(document).delegate('*[data-toggle=lightbox]', 'click', function(event) {
      event.preventDefault();
      return $(this).ekkoLightbox({
        onShown: function() {
          var lightbox;
          lightbox = this;
          return document.addEventListener('serverResponse', function() {
            return lightbox.close();
          });
        }
      });
    });
    return $('[data-toggle=switch]').bootstrapSwitch();
  });

}).call(this);

//# sourceMappingURL=app.js.map
