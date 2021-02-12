(function ($) {
  if (typeof acf.add_action === 'undefined') {
    return;
  }

  /**
   * The hook below is fired when initializing
   * new or existing example fields.
   *
   * @param {jQuery} element
   */
  acf.add_action('ready append', function (element) {
    acf.get_fields({ type: 'example_field' }, element).each(function () {
      // console.log($(this))
    });
  });
})(jQuery);
