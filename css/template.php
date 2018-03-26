<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  sixshoptheme_preprocess_html($variables, $hook);
  sixshoptheme_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // sixshoptheme_preprocess_node_page() or sixshoptheme_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function sixshoptheme_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
* Implements hook_form_alter().
*
*/
function sixshoptheme_form_search_block_form_alter(&$form, &$form_state) {
$form['actions']['submit']['#type'] = 'image_button';
$form['actions']['submit']['#src'] = drupal_get_path('theme', 'sixshoptheme') . '/images/search.png';
}

function sixshoptheme_preprocess_search_result(&$vars, $hook) {
    if(isset($vars['result']['node'])){
        $node = $vars['result']['node'];
        $image = $node->field_photo_de_pr_sentation['und'][0]['uri'];
        $vars['image'] = $image;
    }
}

function sixshoptheme_process_page(&$variables) {        
    if (arg(0) == 'search') {
        $variables['title'] = 'Recherche';      
    }
}

function sixshoptheme_theme(&$existing, $type, $theme, $path) {
   $hooks['user_login_block'] = array(
     'template' => 'templates/user-login-block',
     'render element' => 'form',
   );
   return $hooks;
 }

function sixshoptheme_preprocess_user_login_block(&$vars) {
  $vars['name'] = render($vars['form']['name']);
  $vars['pass'] = render($vars['form']['pass']);
  $vars['submit'] = render($vars['form']['actions']['submit']);
  $vars['rendered'] = drupal_render_children($vars['form']);
}


// function sixshoptheme_preprocess_page(&$variables, $hook) {
//   $options = array('type' => 'file');  // indique à Drupal que le javascript dans drupal_add_js est un fichier
//    if ((in_array('page-contacts', $variables['classes_array']))) //fair un test sur arg()
//     drupal_add_js(drupal_get_path('theme', 'ew2_dagobert'). 'js/contactConnecteur.js', $options);
//     drupal_add_js(drupal_get_path('theme', 'ew2_dagobert'). 'js/contactDraggable.js', $options);
//     drupal_add_js(drupal_get_path('theme', 'ew2_dagobert'). 'js/contactEnvoi.js', $options);
// }

function sixshoptheme_preprocess_page(&$vars, $hook) {
  if(arg(0) == "contacts") {
    drupal_add_js(path_to_theme().'/js/contactConnecteur.js');
    drupal_add_js(path_to_theme().'/js/contactForm.js');
    drupal_add_js(path_to_theme().'/js/jquery.ui.touch-punch.min.js');
    drupal_set_title('Contacts');
    drupal_add_library('system','ui.draggable');
    drupal_add_library('system','ui.droppable');
  }

  if(arg(0) == "applimobile") {
    drupal_add_js(path_to_theme().'/js/applicationMobile.js');
  }

  //Scrollbar
  drupal_add_js(path_to_theme().'/js/jscrollpane/jquery.jscrollpane.min.js');
  drupal_add_js(path_to_theme().'/js/jscrollpane/jquery.mousewheel.js');
  drupal_add_js(path_to_theme().'/js/jscrollpane/mwheelIntent.js');
  drupal_add_js(path_to_theme().'/js/scrollBar.js');
  drupal_add_js(path_to_theme().'/js/scrollBarSearch.js');

  //Video title
  drupal_add_js(path_to_theme().'/js/titleVideo.js');

  //Modify the color button player
  drupal_add_js(path_to_theme().'/js/customPlayer.js');

  //Correct the Ajax Problem (hiiiiide)
  drupal_add_js(path_to_theme().'/js/ajaxProblem.js');

  //Search
  drupal_add_js(path_to_theme().'/js/searchPage.js');

  //Mobile
  drupal_add_js(path_to_theme().'/js/mobile.js');

  $vars['scripts'] = drupal_get_js();

}


