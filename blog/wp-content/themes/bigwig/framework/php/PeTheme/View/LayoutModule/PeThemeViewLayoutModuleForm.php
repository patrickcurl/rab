<?php

class PeThemeViewLayoutModuleForm extends PeThemeViewLayoutModule {

	public function name() {
		return __pe("Contact Form");
	}

	public function messages() {
		return
			array(
				  "title" => "",
				  "type" => __pe("Contact Form")
				  );
	}

	public function fields() {
		return
			array(
				  "content" =>
				  array(
						"label" => __pe("Intro Text"),
						"type" => "Editor",
						"description" => __pe("Text shown before the form fields."),
						"default" => sprintf(__pe('<h3>Your Personal Details</h3>%s<h6>Tell Us About Yourself</h6>'),"\n")
						),
				  "submit" =>
				  array(
						"label" => __pe("Submit Label"),
						"type" => "Text",
						"description" => __pe("Label of the form submit button."),
						"default" => __pe('Submit Form')
						),
				  "msgOK" =>
				  array(
						"label" => __pe("Confirmation"),
						"type" => "Editor",
						"description" => __pe("Text shown when form is successfully submitted."),
						"default" => __pe('<strong>Your Message Has Been Sent!</strong> Thank you for contacting us.')
						),
				  "msgKO" =>
				  array(
						"label" => __pe("Errors"),
						"type" => "Editor",
						"description" => __pe("Text shown when there are validation errors."),
						"default" => __pe('<strong>Oops, An error has ocurred!</strong> See the marked fields above to fix the errors.')
						),
				  "fields" => 
				  array(
						"label"=>__pe("Fields"),
						"type"=>"Items",
						"section"=>__pe("Header"),
						"description" => __pe("Add one or more fields to the form."),
						"button_label" => __pe("Add New Field"),
						"sortable" => true,
						"auto" => __pe("Layer"),
						"unique" => false,
						"editable" => false,
						"legend" => true,
						"fields" => 
						array(
							  array(
									"label" => __pe("Type"),
									"name" => "type",
									"type" => "select",
									"options" => 
									array(
										  __pe("Text") => "text",
										  __pe("TextArea") => "textarea"
										  ),
									"width" => 100,
									"default" => "text"
									),
							  array(
									"label" => __pe("Label"),
									"name" => "label",
									"type" => "text",
									"width" => 150, 
									"default" => __pe("Name")
									),
							  array(
									"label" => __pe("Name"),
									"name" => "name",
									"type" => "text",
									"width" => 100, 
									"default" => "Name"
									),
							  array(
									"label" => __pe("Required"),
									"name" => "required",
									"type" => "select",
									"width" => 150,
									"options" => 
									array(
										  __pe("Required") => "required",
										  __pe("Not Required") => ""
										  ),
									"default" => "required"
									)
							  ),
						"default" => 
						array(
							  array(
									"type" => "text",
									"label" => __pe("Name"),
									"name" => "author",
									"required" => "required"
									),
							  array(
									"type" => "text",
									"label" => __pe("Address"),
									"name" => "address",
									"required" => ""
									),
							  array(
									"type" => "text",
									"label" => __pe("Phone"),
									"name" => "phone",
									"required" => ""
									),
							  array(
									"type" => "text",
									"label" => __pe("Email"),
									"name" => "email",
									"required" => "required"
									),
							  array(
									"type" => "text",
									"label" => __pe("Website"),
									"name" => "website",
									"required" => ""
									),
							  array(
									"type" => "textarea",
									"label" => __pe("Message"),
									"name" => "message",
									"required" => "required"
									)
							  )
						)
				  );
		
	}

	public function template() {
		peTheme()->get_template_part("viewmodule","form");
	}

	public function tooltip() {
		return __pe("Use this block to add a contact form to your layout. This block consists of a form with configurable input fields.");
	}


}

?>
