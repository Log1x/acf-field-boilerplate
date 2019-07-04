export default {
  init: (field) => {
    /**
     * Ready Append
     *
     * These are 2 events which are fired during the page load.
     * ready = on page load similar to $(document).ready()
     * append = on new DOM elements appended via repeater field
     *
     * @param	 element jQuery element which contains the ACF fields
     * @return void
     */
    acf.add_action('ready append', function (element) {
      acf.get_fields({
        type: field.name
      }, element).each(function () {
        // console.log(element);
      });
    });
  }
}
