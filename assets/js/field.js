;(function ($) {
  if (typeof acf.add_action === 'undefined') {
    return
  }

  /**
   * The hook below is fired when a document potentially containing
   * the example field is finished loading or has had an element
   * appended.
   *
   * @param {jQuery} element
   */
  acf.add_action('ready append', function (element) {
    acf.get_fields({ type: 'example_field' }, element).each(function () {
      // console.log($(this))
    })
  })
})(jQuery)
