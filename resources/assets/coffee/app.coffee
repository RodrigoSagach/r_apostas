$(document).ready(() ->

  # Sidebar
  $('.tree-toggle').click(() ->
    $(this).parent().children('ul.tree').toggle(200)
  )

  $('.delete-confirmation').confirmation({
    btnOkLabel: 'Apagar',
    btnCancelClass: 'Cancelar',
    singleton: true,
    popout: true,
    title: 'Você tem Certeza?',
    placement: 'top'
  })

  $(document).delegate('*[data-toggle=lightbox]', 'click', (event) ->
    event.preventDefault()
    $(this).ekkoLightbox()
  )
)