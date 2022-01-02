<?php

namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use \Elementor\Widget_Base;



class Finest_Source_Code extends Widget_Base {

   /**
	 * Get widget Name.
	 *
	 * @return string Widget id.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'finest-source-code';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __('Source Code', 'finest-addons');
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'feather icon-code';
	}

    public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return ['source-code', 'source', 'code', 'finest' ];
	}

	public function lng_type() {
		return [
			'markup' => __('HTML Markup', 'finest-addons'),
			'css' => __('CSS', 'finest-addons'),
			'clike' => __('Clike', 'finest-addons'),
			'javascript' => __('JavaScript', 'finest-addons'),
			'abap' => __('ABAP', 'finest-addons'),
			'abnf' => __('Augmented Backus–Naur form', 'finest-addons'),
			'actionscript' => __('ActionScript', 'finest-addons'),
			'ada' => __('Ada', 'finest-addons'),
			'apacheconf' => __('Apache Configuration', 'finest-addons'),
			'apl' => __('APL', 'finest-addons'),
			'applescript' => __('AppleScript', 'finest-addons'),
			'arduino' => __('Arduino', 'finest-addons'),
			'arff' => __('ARFF', 'finest-addons'),
			'asciidoc' => __('AsciiDoc', 'finest-addons'),
			'asm6502' => __('6502 Assembly', 'finest-addons'),
			'aspnet' => __('ASP.NET (C#)', 'finest-addons'),
			'autohotkey' => __('AutoHotkey', 'finest-addons'),
			'autoit' => __('Autoit', 'finest-addons'),
			'bash' => __('Bash', 'finest-addons'),
			'basic' => __('BASIC', 'finest-addons'),
			'batch' => __('Batch', 'finest-addons'),
			'bison' => __('Bison', 'finest-addons'),
			'bnf' => __('Bnf', 'finest-addons'),
			'brainfuck' => __('Brainfuck', 'finest-addons'),
			'bro' => __('Bro', 'finest-addons'),
			'c' => __('C', 'finest-addons'),
			'csharp' => __('Csharp', 'finest-addons'),
			'cpp' => __('Cpp', 'finest-addons'),
			'cil' => __('Cil', 'finest-addons'),
			'coffeescript' => __('Coffeescript', 'finest-addons'),
			'cmake' => __('Cmake', 'finest-addons'),
			'clojure' => __('Clojure', 'finest-addons'),
			'crystal' => __('Crystal', 'finest-addons'),
			'csp' => __('Csp', 'finest-addons'),
			'css-extras' => __('Css-extras', 'finest-addons'),
			'd' => __('D', 'finest-addons'),
			'dart' => __('Dart', 'finest-addons'),
			'diff' => __('Diff', 'finest-addons'),
			'django' => __('Django', 'finest-addons'),
			'dns-zone-file' => __('Dns-zone-file', 'finest-addons'),
			'docker' => __('Docker', 'finest-addons'),
			'ebnf' => __('Ebnf', 'finest-addons'),
			'eiffel' => __('Eiffel', 'finest-addons'),
			'ejs' => __('Ejs', 'finest-addons'),
			'elixir' => __('Elixir', 'finest-addons'),
			'elm' => __('Elm', 'finest-addons'),
			'erb' => __('Erb', 'finest-addons'),
			'erlang' => __('Erlang', 'finest-addons'),
			'fsharp' => __('Fsharp', 'finest-addons'),
			'firestore-security-rules' => __('Firestore-security-rules', 'finest-addons'),
			'flow' => __('Flow', 'finest-addons'),
			'fortran' => __('Fortran', 'finest-addons'),
			'gcode' => __('Gcode', 'finest-addons'),
			'gdscript' => __('Gdscript', 'finest-addons'),
			'gedcom' => __('Gedcom', 'finest-addons'),
			'gherkin' => __('Gherkin', 'finest-addons'),
			'git' => __('Git', 'finest-addons'),
			'glsl' => __('Glsl', 'finest-addons'),
			'gml' => __('Gml', 'finest-addons'),
			'go' => __('Go', 'finest-addons'),
			'graphql' => __('Graphql', 'finest-addons'),
			'groovy' => __('Groovy', 'finest-addons'),
			'haml' => __('Haml', 'finest-addons'),
			'handlebars' => __('Handlebars', 'finest-addons'),
			'haskell' => __('Haskell', 'finest-addons'),
			'haxe' => __('Haxe', 'finest-addons'),
			'hcl' => __('Hcl', 'finest-addons'),
			'http' => __('Http', 'finest-addons'),
			'hpkp' => __('Hpkp', 'finest-addons'),
			'hsts' => __('Hsts', 'finest-addons'),
			'ichigojam' => __('Ichigojam', 'finest-addons'),
			'icon' => __('Icon', 'finest-addons'),
			'inform7' => __('Inform7', 'finest-addons'),
			'ini' => __('Ini', 'finest-addons'),
			'io' => __('Io', 'finest-addons'),
			'j' => __('J', 'finest-addons'),
			'java' => __('Java', 'finest-addons'),
			'javadoc' => __('Javadoc', 'finest-addons'),
			'javadoclike' => __('Javadoclike', 'finest-addons'),
			'javastacktrace' => __('Javastacktrace', 'finest-addons'),
			'jolie' => __('Jolie', 'finest-addons'),
			'jq' => __('Jq', 'finest-addons'),
			'jsdoc' => __('Jsdoc', 'finest-addons'),
			'js-extras' => __('Js-extras', 'finest-addons'),
			'js-templates' => __('Js-templates', 'finest-addons'),
			'json' => __('Json', 'finest-addons'),
			'jsonp' => __('Jsonp', 'finest-addons'),
			'json5' => __('Json5', 'finest-addons'),
			'julia' => __('Julia', 'finest-addons'),
			'keyman' => __('Keyman', 'finest-addons'),
			'kotlin' => __('Kotlin', 'finest-addons'),
			'latex' => __('Latex', 'finest-addons'),
			'less' => __('Less', 'finest-addons'),
			'lilypond' => __('Lilypond', 'finest-addons'),
			'liquid' => __('Liquid', 'finest-addons'),
			'lisp' => __('Lisp', 'finest-addons'),
			'livescript' => __('Livescript', 'finest-addons'),
			'lolcode' => __('Lolcode', 'finest-addons'),
			'lua' => __('Lua', 'finest-addons'),
			'makefile' => __('Makefile', 'finest-addons'),
			'markdown' => __('Markdown', 'finest-addons'),
			'markup-templating' => __('Markup-templating', 'finest-addons'),
			'matlab' => __('Matlab', 'finest-addons'),
			'mel' => __('Mel', 'finest-addons'),
			'mizar' => __('Mizar', 'finest-addons'),
			'monkey' => __('Monkey', 'finest-addons'),
			'n1ql' => __('N1ql', 'finest-addons'),
			'n4js' => __('N4js', 'finest-addons'),
			'nand2tetris-hdl' => __('Nand2tetris-hdl', 'finest-addons'),
			'nasm' => __('Nasm', 'finest-addons'),
			'nginx' => __('Nginx', 'finest-addons'),
			'nim' => __('Nim', 'finest-addons'),
			'nix' => __('Nix', 'finest-addons'),
			'nsis' => __('Nsis', 'finest-addons'),
			'objectivec' => __('Objectivec', 'finest-addons'),
			'ocaml' => __('Ocaml', 'finest-addons'),
			'opencl' => __('Opencl', 'finest-addons'),
			'oz' => __('Oz', 'finest-addons'),
			'parigp' => __('Parigp', 'finest-addons'),
			'parser' => __('Parser', 'finest-addons'),
			'pascal' => __('Pascal', 'finest-addons'),
			'pascaligo' => __('Pascaligo', 'finest-addons'),
			'pcaxis' => __('Pcaxis', 'finest-addons'),
			'perl' => __('Perl', 'finest-addons'),
			'php' => __('Php', 'finest-addons'),
			'phpdoc' => __('Phpdoc', 'finest-addons'),
			'php-extras' => __('Php-extras', 'finest-addons'),
			'plsql' => __('Plsql', 'finest-addons'),
			'powershell' => __('Powershell', 'finest-addons'),
			'processing' => __('Processing', 'finest-addons'),
			'prolog' => __('Prolog', 'finest-addons'),
			'properties' => __('Properties', 'finest-addons'),
			'protobuf' => __('Protobuf', 'finest-addons'),
			'pug' => __('Pug', 'finest-addons'),
			'puppet' => __('Puppet', 'finest-addons'),
			'pure' => __('Pure', 'finest-addons'),
			'python' => __('Python', 'finest-addons'),
			'q' => __('Q', 'finest-addons'),
			'qore' => __('Qore', 'finest-addons'),
			'r' => __('R', 'finest-addons'),
			'jsx' => __('Jsx', 'finest-addons'),
			'tsx' => __('Tsx', 'finest-addons'),
			'renpy' => __('Renpy', 'finest-addons'),
			'reason' => __('Reason', 'finest-addons'),
			'regex' => __('Regex', 'finest-addons'),
			'rest' => __('Rest', 'finest-addons'),
			'rip' => __('Rip', 'finest-addons'),
			'roboconf' => __('Roboconf', 'finest-addons'),
			'ruby' => __('Ruby', 'finest-addons'),
			'rust' => __('Rust', 'finest-addons'),
			'sas' => __('Sas', 'finest-addons'),
			'sass' => __('Sass', 'finest-addons'),
			'scss' => __('Scss', 'finest-addons'),
			'scala' => __('Scala', 'finest-addons'),
			'scheme' => __('Scheme', 'finest-addons'),
			'shell-session' => __('Shell-session', 'finest-addons'),
			'smalltalk' => __('Smalltalk', 'finest-addons'),
			'smarty' => __('Smarty', 'finest-addons'),
			'soy' => __('Soy', 'finest-addons'),
			'splunk-spl' => __('Splunk-spl', 'finest-addons'),
			'sql' => __('Sql', 'finest-addons'),
			'stylus' => __('Stylus', 'finest-addons'),
			'swift' => __('Swift', 'finest-addons'),
			'tap' => __('Tap', 'finest-addons'),
			'tcl' => __('Tcl', 'finest-addons'),
			'textile' => __('Textile', 'finest-addons'),
			'toml' => __('Toml', 'finest-addons'),
			'tt2' => __('Tt2', 'finest-addons'),
			'turtle' => __('Turtle', 'finest-addons'),
			'twig' => __('Twig', 'finest-addons'),
			'typescript' => __('Typescript', 'finest-addons'),
			't4-cs' => __('T4-cs', 'finest-addons'),
			't4-vb' => __('T4-vb', 'finest-addons'),
			't4-templating' => __('T4-templating', 'finest-addons'),
			'vala' => __('Vala', 'finest-addons'),
			'vbnet' => __('Vbnet', 'finest-addons'),
			'velocity' => __('Velocity', 'finest-addons'),
			'verilog' => __('Verilog', 'finest-addons'),
			'vhdl' => __('Vhdl', 'finest-addons'),
			'vim' => __('Vim', 'finest-addons'),
			'visual-basic' => __('Visual-basic', 'finest-addons'),
			'wasm' => __('Wasm', 'finest-addons'),
			'wiki' => __('Wiki', 'finest-addons'),
			'xeora' => __('Xeora', 'finest-addons'),
			'xojo' => __('Xojo', 'finest-addons'),
			'xquery' => __('Xquery', 'finest-addons'),
			'yaml' => __('Yaml', 'finest-addons'),
		];
	}


    protected function _register_controls() {

		$this->start_controls_section(
			'_section_source_code',
			[
				'label' => __('Source Code', 'finest-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'lng_type',
			[
				'label' => __('Language Type', 'finest-addons'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'markup',
				'options' => $this->lng_type(),
			]
		);

		$this->add_control(
			'theme',
			[
				'label' => __('Theme', 'finest-addons'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'prism',
				'options' => [
					'prism' => __('Default', 'finest-addons'),
					'prism-coy' => __('Coy', 'finest-addons'),
					'prism-dark' => __('Dark', 'finest-addons'),
					'prism-funky' => __('Funky', 'finest-addons'),
					'prism-okaidia' => __('Okaidia', 'finest-addons'),
					'prism-solarizedlight' => __('Solarized light', 'finest-addons'),
					'prism-tomorrow' => __('Tomorrow', 'finest-addons'),
					'prism-twilight' => __('Twilight', 'finest-addons'),
					'custom' => __('Custom Color', 'finest-addons'),
				],
                'style_transfer' => true,
			]
		);

		$this->add_control(
			'source_code',
			[
				'label' => __('Source Code', 'finest-addons'),
				'type' => Controls_Manager::CODE,
				'rows' => 20,
				'default' => '<p class="random-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>',
				'placeholder' => __('Source Code....', 'finest-addons'),
				'condition' => [
					'lng_type!' => '',
				],
			]
		);
		$this->add_control(
			'copy_btn_text_show',
			[
				'label' => __('Copy Button Text Show?', 'finest-addons'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
                'style_transfer' => true,
			]
		);
		$this->add_control(
			'copy_btn_text',
			[
				'label' => __('Copy Button Text', 'finest-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 10,
				'default' => __('Copy to clipboard', 'finest-addons'),
				'placeholder' => __('Copy Button Text', 'finest-addons'),
				'condition' => [
					'copy_btn_text_show' => 'yes',
				],
			]
		);
		$this->add_control(
			'after_copy_btn_text',
			[
				'label' => __('After Copy Button Text', 'finest-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 10,
				'default' => __('Copied', 'finest-addons'),
				'placeholder' => __('Copied', 'finest-addons'),
				'condition' => [
					'copy_btn_text_show' => 'yes',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_source_code_custom_color',
			[
				'label' => __('Custom Color', 'finest-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_background',
			[
				'label' => __( 'Background Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom :not(pre) > code[class*="language-"],{{WRAPPER}} .custom pre[class*="language-"]' => 'background: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_text_color',
			[
				'label' => __( 'Text Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom code[class*="language-"],{{WRAPPER}} .custom pre[class*="language-"]' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_text_shadow_color',
			[
				'label' => __( 'Text shadow Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom code[class*="language-"],{{WRAPPER}} .custom pre[class*="language-"]' => 'text-shadow: 0 1px {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_slate_gray',
			[
				'label' => __( 'Slate Gray Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.comment,{{WRAPPER}} .custom .token.prolog,{{WRAPPER}} .custom .token.doctype,{{WRAPPER}} .custom .token.cdata' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_dusty_gray',
			[
				'label' => __( 'Dusty Gray Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.punctuation' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_fresh_eggplant',
			[
				'label' => __( 'Fresh Eggplant Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.property,{{WRAPPER}} .custom .token.tag,{{WRAPPER}} .custom .token.boolean,{{WRAPPER}} .custom .token.number,{{WRAPPER}} .custom .token.constant,{{WRAPPER}} .custom .token.symbol,{{WRAPPER}} .custom .token.deleted' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_limeade',
			[
				'label' => __( 'Limeade Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.selector,{{WRAPPER}} .custom .token.attr-name,{{WRAPPER}} .custom .token.string,{{WRAPPER}} .custom .token.char,{{WRAPPER}} .custom .token.builtin,{{WRAPPER}} .custom .token.inserted' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_sepia_skin',
			[
				'label' => __( 'Sepia Skin Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.operator,{{WRAPPER}} .custom .token.entity,{{WRAPPER}} .custom .token.url,{{WRAPPER}} .custom .language-css .token.string,{{WRAPPER}} .custom .style .token.string' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_xanadu',
			[
				'label' => __( 'Xanadu Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.operator,{{WRAPPER}} .custom .token.entity,{{WRAPPER}} .custom .token.url,{{WRAPPER}} .custom .language-css .token.string,{{WRAPPER}} .custom .style .token.string' => 'background: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_deep_cerulean',
			[
				'label' => __( 'Deep Cerulean Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.atrule,{{WRAPPER}} .custom .token.attr-value,{{WRAPPER}} .custom .token.keyword' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_cabaret',
			[
				'label' => __( 'Cabaret Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.function,{{WRAPPER}} .custom .token.class-name' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_tangerine',
			[
				'label' => __( 'Tangerine Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom .token.regex,{{WRAPPER}} .custom .token.important,{{WRAPPER}} .custom .token.variable' => 'color: {{VALUE}}',
				],
				'condition' => [
					'theme' => 'custom',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_source_code_style',
			[
				'label' => __('Style', 'finest-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'source_code_box_height',
			[
				'label' => __('Height', 'finest-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .finest-source-code pre' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __('Box Border', 'finest-addons'),
				'selector' => '{{WRAPPER}}  .finest-source-code pre[class*="language-"]',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'box_border_radius',
			[
				'label' => __('Border Radius', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .finest-source-code pre[class*="language-"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'source_code_box_padding',
			[
				'label' => __('Padding', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .finest-source-code pre' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'source_code_box_margin',
			[
				'label' => __('Margin', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .finest-source-code pre' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'copy_btn_color',
			[
				'label' => __( 'Copy Button Text Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-copy-code-button' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
				'condition' => [
					'copy_btn_text_show' => 'yes',
				],
			]
		);

		$this->add_control(
			'copy_btn_bg',
			[
				'label' => __( 'Copy Button Background', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-copy-code-button' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'copy_btn_text_show' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$source_code = $settings['source_code'];
		$theme = !empty($settings['theme']) ? $settings['theme'] : 'prism';
		$this->add_render_attribute('finest-code-wrap', 'class', 'finest-source-code');
		$this->add_render_attribute('finest-code-wrap', 'class', $theme);
		$this->add_render_attribute('finest-code-wrap', 'data-lng-type', $settings['lng_type']);
		if ('yes' == $settings['copy_btn_text_show'] && $settings['after_copy_btn_text']) {
			$this->add_render_attribute('finest-code-wrap', 'data-after-copy', $settings['after_copy_btn_text']);
		}
		$this->add_render_attribute('finest-code', 'class', 'language-' . $settings['lng_type']);
		?>
		<?php if (!empty($source_code)): ?>
			<div <?php $this->print_render_attribute_string('finest-code-wrap'); ?>>
			<pre>
			<?php if ('yes' == $settings['copy_btn_text_show'] && $settings['copy_btn_text']): ?>
				<button class="finest-copy-code-button"><?php echo esc_html($settings['copy_btn_text']) ?></button>
			<?php endif; ?>
				<code <?php $this->print_render_attribute_string('finest-code'); ?>>
					<?php echo esc_html($source_code); ?>
				</code>
			</pre>
			</div>
		<?php endif; ?>
		<?php

	}

}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Source_Code() );