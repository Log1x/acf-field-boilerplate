/**
 * Import local dependencies
 */
import Ready from './events/ready';

/**
 * Field
 */
const field =  {
  name: 'example_field',
};

/**
 * Initialize Events
 */
const events = () => {
  Ready.init(field);
}

/**
 * Load Events
 */
if (typeof acf.add_action !== 'undefined') {
  jQuery(document).ready(() => events);
}
