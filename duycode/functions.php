<?php
# Use classic editor
add_filter('use_block_editor_for_post', '__return_false');

# Don't replace " " to ” ”
remove_filter('the_content', 'wptexturize');

# Displays post image attachment (sizes: thumbnail, medium, full)
function get_first_image() {
   global $post;
   ob_start();
   ob_end_clean();

   $first_img = '';

   if (empty($first_img)) {
      preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches_src);
      if (!empty($matches_src)) {
         $first_img = $matches_src[1];
      }
   }
   if (empty($first_img)) {
      $first_img = bloginfo('template_directory') . "/images/no-image.gif";
   }

   return $first_img;
}

function replace_pre_and_code_content($content) {
   // Định nghĩa biểu thức chính quy để tìm và thay thế nội dung trong thẻ <pre><code>
   $pattern = '/<pre><code(.*?)>(.*?)<\/code><\/pre>/s';

   // Hàm preg_replace_callback sẽ thay thế mỗi kết quả của biểu thức chính quy bằng nội dung đã được xử lý
   $safe_content = preg_replace_callback($pattern, function($matches) {
       // $matches[2] chứa nội dung bên trong thẻ <pre><code>
       $code_content = $matches[2];
       // Thực hiện thay đổi ký tự trong nội dung bên trong thẻ <pre><code>
       $code_content = str_replace('<', '&lt;', $code_content);
       $code_content = str_replace('>', '&gt;', $code_content);
       // Trả về nội dung đã được thay đổi
       return '<pre><code' . $matches[1] . '>' . $code_content . '</code></pre>';
   }, $content);

   // Trả về nội dung bài viết với các thay đổi
   return $safe_content;
}
add_filter('the_content', 'replace_pre_and_code_content');
