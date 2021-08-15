<?php

class MyThemeMenuWalker extends Walker_Nav_Menu {
	public function walk($elements, $max_depth, ...$args ) {
		$output = '';
		$template = '<a class="p-2 link-secondary" href="{href}">{title}</a>';
		$templateSearch = [
			'{title}', '{href}'
		];

		// Invalid parameter or nothing to walk.
		if ($max_depth < -1 || empty( $elements ) ) {
			return $output;
		}

		$parent_field = $this->db_fields['parent'];

		$top_level_elements = array();
		foreach ( $elements as $e ) {
			if (empty( $e->$parent_field ) ) {
				$top_level_elements[] = $e;
			}
		}

		foreach ( $top_level_elements as $e ) {
			$output .= str_replace($templateSearch, [$e->title, $e->url], $template);
		}

		return $output;
	}
}