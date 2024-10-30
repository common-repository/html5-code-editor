<?php
/*
Plugin Name: HTML5 CODE Editor
Plugin URI: https://wordpress.org/plugins/html5-code-editor/
Version: 1.05
Description: Integrate code editor to your website.
Author: Adeleye Ayodeji
Author URI: http://adeleyeayodeji.com/
Text Domain: html5-code-editor
Domain Path: /languages
*/

//Adding settings link
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'html5_code_editor_link');
function html5_code_editor_link( $links ) {
  $links[] = '<a href="' .
    admin_url( 'admin.php?page=html5-code-editor' ) .
    '">' . __('Go to Editor') . '</a>';
  return $links;
}

//Adding js and css script to wordpress
  function html5_code_editor_style(){
   
      wp_enqueue_style( 'style-css', plugin_dir_url( __FILE__ ).'assets/css/style.css' );
      wp_enqueue_script( 'core-js', plugin_dir_url( __FILE__ ).'assets/js/core.js' );
  }

  add_action('admin_enqueue_scripts', 'html5_code_editor_style');

	// adding to the menu
	function html5_code_editor(){
		add_menu_page(
      'HTML5 CODE Editor', // $page_title
      'HTML5 CODE Editor', // $menu_title
      'manage_options', //  $capability
      'html5-code-editor', // $menu_slug
      'html5_code_editorpage', // $function
      plugin_dir_url( __FILE__ ) . 'assets/img/html5-logo.png', // Plugin $icon_url
      200 // Plugin $position
    );
	}
	add_action('admin_menu', 'html5_code_editor');

	function html5_code_editorpage(){
		?>
		<div class="wrap">
      <div class="contenthtml">
      <div id="hearder1">
          <code>HTML5 <span>CODE</span> Editor</code>
        </div>
        <hr>
        <p class="descp">Easily integrate in Page and Post with this shortcode <code>[html5code]</code></p>
        <div class="content">
			     <!-- Textarea container start here -->
          <div class="textareacontainer">
            <div class="textarea">
                <div class="headerCon">
                  <div class="headerText">Edit This Code:</div>
                </div>
                <!-- HTML5 Editor begins here -->
                <div class="textareawrapper">
                    <textarea autocomplete="off" class="code_input" id="textareaCode" wrap="logical" spellcheck="false"><!DOCTYPE html>
                      <html>
                        <head>
                            <style type="text/css">
                                p{
                                    color: red;
                                    font-weight: bold;
                                }
                                #demo{
                                    color: blue;
                                }
                            </style>
                        </head>
                        <body>

                            <p>This example calls a function which performs a calculation, and returns the result:</p>

                            <p id="demo"></p>

                            <script>
                            function myFunction(a, b) {
                                return a * b;
                            }
                            document.getElementById("demo").innerHTML = myFunction(4, 3);
                            </script>

                        </body>
                      </html>
                      </textarea>
                                <form autocomplete="off" class="codeform">
                                  <input type="hidden" name="code" id="code" />
                                  <input type="hidden" id="bt" name="bt" />
                                </form>
                 </div>
               <!-- HTML5 Editor ends here -->
            </div>
          </div>
          <!-- Textarea container ends here -->

          <center>
              <button class="seeResult" type="button" onclick="loadscript()">
                 See Result &raquo;
            </button>
          </center>

          <!-- Result field for HTML5 -->
          <div class="iframecontainer">
            <div class="iframe">
              <div class="headerCon">
                <div class="headerText">Result:</div>
              </div>
              <div id="iframewrapper" class="iframewrapper">
              </div>
            </div>
          </div> 
          <!-- Result field end for HTML5 -->
        <script>loadscript()</script>
					<hr>
					<p align="center">Proudly designed by <a href="https://adeleyeayodeji.com/" target="_blank">Adeleye Ayodeji</a></p>
		</div>
  </div>
		<?php
	}



  //Adding shortcode
  function html5_code_editorfunction(){
      wp_enqueue_style( 'style-css', plugin_dir_url( __FILE__ ).'assets/css/style.css' );
      wp_enqueue_script( 'core-js', plugin_dir_url( __FILE__ ).'assets/js/core.js' );
    $snipet = "<div class='wrap'>"; 
    ?>
           <div class="contenthtml">
      <div id="hearder1">
          <code>HTML5 <span>CODE</span> Editor</code>
        </div>
        <hr>
        <div class="content">
           <!-- Textarea container start here -->
          <div class="textareacontainer">
            <div class="textarea">
                <div class="headerCon">
                  <div class="headerText">Edit This Code:</div>
                </div>
                <!-- HTML5 Editor begins here -->
                <div class="textareawrapper">
                    <textarea autocomplete="off" class="code_input" id="textareaCode" wrap="logical" spellcheck="false"><!DOCTYPE html>
                      <html>
                        <head>
                            <style type="text/css">
                                p{
                                    color: red;
                                    font-weight: bold;
                                }
                                #demo{
                                    color: blue;
                                }
                            </style>
                        </head>
                        <body>

                            <p>This example calls a function which performs a calculation, and returns the result:</p>

                            <p id="demo"></p>

                            <script>
                            function myFunction(a, b) {
                                return a * b;
                            }
                            document.getElementById("demo").innerHTML = myFunction(4, 3);
                            </script>

                        </body>
                      </html>
                      </textarea>
                                <form autocomplete="off" class="codeform">
                                  <input type="hidden" name="code" id="code" />
                                  <input type="hidden" id="bt" name="bt" />
                                </form>
                 </div>
               <!-- HTML5 Editor ends here -->
            </div>
          </div>
          <!-- Textarea container ends here -->

          <center>
              <button class="seeResult" type="button" onclick="loadscript()">
                 See Result &raquo;
            </button>
          </center>

          <!-- Result field for HTML5 -->
          <div class="iframecontainer">
            <div class="iframe">
              <div class="headerCon">
                <div class="headerText">Result:</div>
              </div>
              <div id="iframewrapper" class="iframewrapper">
              </div>
            </div>
          </div> 
          <!-- Result field end for HTML5 -->
    </div>
  <?php $snipet .= "</div>";
    return $snipet;
  }

  add_shortcode('html5code','html5_code_editorfunction');
?>