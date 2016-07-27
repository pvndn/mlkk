<?php

	if(! function_exists('setActive') ) {
		function setActive ( $path) {
			return Request::is($path . '*') ? ' class=active' :  '';
		}
	}

	if (!function_exists('renderNode')) {
	    /**
	     * Render nodes for nested sets
	     *
	     * @param $node
	     * @param $resource
	     * @return string
	     */
	    function renderNode($node)
	    {
	    	if($node->category_id != null) {
	    		$name = $node->category->name;
	    	}
	    	if($node->page_id != null) {
	    		$name = $node->page->name;
	    	}
	        $id = 'data-id="' . $node->id .'"';
	        $list = 'class="dd-list"';
	        $class = 'class="dd-item"';
	        $handle = 'class="dd-handle"';
	        $title  = '<div '.$handle.'>' . $name . '</div>';
	        if ($node->isLeaf()) {
	            return '<li '.$class.' '.$id.'>' . $title . ' </li>';
	        } else {
		            $html = '<li '.$class.' '.$id.'>' . $title;
		            $html .= '<ol '.$list.'>';
		            foreach ($node->children as $child) {
		                $html .= renderNode($child);
		            }
		            $html .= '</ol>';
		            $html .= '</li>';
	        }
	        return $html;
	    }
	}

	if (!function_exists('navication')) {
	    /**
	     * Render nodes for nested sets
	     *
	     * @param $node
	     * @param $resource
	     * @return string
	     */
	    function navication($node)
	    {
				$seg = Request::segment(1);
	    	if($node->category_id != null) {
	    		$name = $node->category->name;
	    		$slug = $node->category->slug;
	    	}
	    	if($node->page_id != null) {
	    		$name = $node->page->name;
	    		$slug = $node->page->slug;
	    	}

				( $seg == $slug ) ? $active = 'class=active' : $active = '';


	    	$url = route('client.category', $slug);


	        $style = 'style="visibility: visible; -webkit-animation-delay:1s; animation-delay:1s;"';
	        $class = 'class="sub-menu animated zoomIn"';

	        if ($node->isLeaf()) {
	            return '<li '. $active .'><a href="'.$url.'/">' . $name . '</a></li>';
	        } else {
		            $html = '<li '. $active .'> <a href="'.$url.'/">' . $name . '</a>';
		            $html .= '<ul '.$class.' '.$style.'>';
		            foreach ($node->children as $child) {
		                $html .= navication($child);
		            }
		            $html .= '</ul>';
		            $html .= '</li>';
	        }
	        return $html;
	    }
	}

if (!function_exists('generateRandomString')) {
	function generateRandomString($length = 12) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}


if (!function_exists('generateImage')) {
	function generateImage($key) {
		$getImage = \App\Models\Slider::select('title', 'image')->where(['key' => $key, 'publish' => 0])->first();
		if($getImage) {
			$image = [
				'title' => $getImage->title,
				'image' => $getImage->image
			];
			$html = '<img src="'. asset($image['image']) .'" title="'. $image['title'] .'">';
		} else {
			$html = 'Đang cập nhật';
		}
		return $html;
	}
}





?>
