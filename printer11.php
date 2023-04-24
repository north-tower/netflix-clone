// start printer
$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);
// create content here
// print
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);

$font = printer_create_font("Arial", 72, 48, 400, false, false, false, 0);
printer_select_font($handle, $font);
printer_draw_text($handle, 'the text that will be printed', 100, 100);
printer_delete_font($font);

$pen = printer_create_pen(PRINTER_PEN_SOLID, 30, "123fde");
printer_select_pen($handle, $pen);
 
printer_draw_line($handle, 1, 10, 1000, 10);
// draw more lines if you want...
 
printer_delete_pen($pen);