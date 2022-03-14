<?php

namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use \Elementor\Widget_Base;



class Quik_Theme_Source_Code extends Widget_Base {

   /**
	 * Get widget Name.
	 *
	 * @return string Widget id.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'quiktheme-source-code';
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
		return __('Source Code', 'quiktheme-addons');
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
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return ['source-code', 'source', 'code', 'quik-theme-addons' ];
	}

	public function lng_type() {
		return [
			'markup' => __('HTML Markup', 'quiktheme-addons'),
			'css' => __('CSS', 'quiktheme-addons'),
			'clike' => __('Clike', 'quiktheme-addons'),
			'javascript' => __('JavaScript', 'quiktheme-addons'),
			'abap' => __('ABAP', 'quiktheme-addons'),
			'abnf' => __('Augmented Backus–Naur form', 'quiktheme-addons'),
			'actionscript' => __('ActionScript', 'quiktheme-addons'),
			'ada' => __('Ada', 'quiktheme-addons'),
			'apacheconf' => __('Apache Configuration', 'quiktheme-addons'),
			'apl' => __('APL', 'quiktheme-addons'),
			'applescript' => __('AppleScript', 'quiktheme-addons'),
			'arduino' => __('Arduino', 'quiktheme-addons'),
			'arff' => __('ARFF', 'quiktheme-addons'),
			'asciidoc' => __('AsciiDoc', 'quiktheme-addons'),
			'asm6502' => __('6502 Assembly', 'quiktheme-addons'),
			'aspnet' => __('ASP.NET (C#)', 'quiktheme-addons'),
			'autohotkey' => __('AutoHotkey', 'quiktheme-addons'),
			'autoit' => __('Autoit', 'quiktheme-addons'),
			'bash' => __('Bash', 'quiktheme-addons'),
			'basic' => __('BASIC', 'quiktheme-addons'),
			'batch' => __('Batch', 'quiktheme-addons'),
			'bison' => __('Bison', 'quiktheme-addons'),
			'bnf' => __('Bnf', 'quiktheme-addons'),
			'brainfuck' => __('Brainfuck', 'quiktheme-addons'),
			'bro' => __('Bro', 'quiktheme-addons'),
			'c' => __('C', 'quiktheme-addons'),
			'csharp' => __('Csharp', 'quiktheme-addons'),
			'cpp' => __('Cpp', 'quiktheme-addons'),
			'cil' => __('Cil', 'quiktheme-addons'),
			'coffeescript' => __('Coffeescript', 'quiktheme-addons'),
			'cmake' => __('Cmake', 'quiktheme-addons'),
			'clojure' => __('Clojure', 'quiktheme-addons'),
			'crystal' => __('Crystal', 'quiktheme-addons'),
			'csp' => __('Csp', 'quiktheme-addons'),
			'css-extras' => __('Css-extras', 'quiktheme-addons'),
			'd' => __('D', 'quiktheme-addons'),
			'dart' => __('Dart', 'quiktheme-addons'),
			'diff' => __('Diff', 'quiktheme-addons'),
			'django' => __('Django', 'quiktheme-addons'),
			'dns-zone-file' => __('Dns-zone-file', 'quiktheme-addons'),
			'docker' => __('Docker', 'quiktheme-addons'),
			'ebnf' => __('Ebnf', 'quiktheme-addons'),
			'eiffel' => __('Eiffel', 'quiktheme-addons'),
			'ejs' => __('Ejs', 'quiktheme-addons'),
			'elixir' => __('Elixir', 'quiktheme-addons'),
			'elm' => __('Elm', 'quiktheme-addons'),
			'erb' => __('Erb', 'quiktheme-addons'),
			'erlang' => __('Erlang', 'quiktheme-addons'),
			'fsharp' => __('Fsharp', 'quiktheme-addons'),
			'firestore-security-rules' => __('Firestore-security-rules', 'quiktheme-addons'),
			'flow' => __('Flow', 'quiktheme-addons'),
			'fortran' => __('Fortran', 'quiktheme-addons'),
			'gcode' => __('Gcode', 'quiktheme-addons'),
			'gdscript' => __('Gdscript', 'quiktheme-addons'),
			'gedcom' => __('Gedcom', 'quiktheme-addons'),
			'gherkin' => __('Gherkin', 'quiktheme-addons'),
			'git' => __('Git', 'quiktheme-addons'),
			'glsl' => __('Glsl', 'quiktheme-addons'),
			'gml' => __('Gml', 'quiktheme-addons'),
			'go' => __('Go', 'quiktheme-addons'),
			'graphql' => __('Graphql', 'quiktheme-addons'),
			'groovy' => __('Groovy', 'quiktheme-addons'),
			'haml' => __('Haml', 'quiktheme-addons'),
			'handlebars' => __('Handlebars', 'quiktheme-addons'),
			'haskell' => __('Haskell', 'quiktheme-addons'),
			'haxe' => __('Haxe', 'quiktheme-addons'),
			'hcl' => __('Hcl', 'quiktheme-addons'),
			'http' => __('Http', 'quiktheme-addons'),
			'hpkp' => __('Hpkp', 'quiktheme-addons'),
			'hsts' => __('Hsts', 'quiktheme-addons'),
			'ichigojam' => __('Ichigojam', 'quiktheme-addons'),
			'icon' => __('Icon', 'quiktheme-addons'),
			'inform7' => __('Inform7', 'quiktheme-addons'),
			'ini' => __('Ini', 'quiktheme-addons'),
			'io' => __('Io', 'quiktheme-addons'),
			'j' => __('J', 'quiktheme-addons'),
			'java' => __('Java', 'quiktheme-addons'),
			'javadoc' => __('Javadoc', 'quiktheme-addons'),
			'javadoclike' => __('Javadoclike', 'quiktheme-addons'),
			'javastacktrace' => __('Javastacktrace', 'quiktheme-addons'),
			'jolie' => __('Jolie', 'quiktheme-addons'),
			'jq' => __('Jq', 'quiktheme-addons'),
			'jsdoc' => __('Jsdoc', 'quiktheme-addons'),
			'js-extras' => __('Js-extras', 'quiktheme-addons'),
			'js-templates' => __('Js-templates', 'quiktheme-addons'),
			'json' => __('Json', 'quiktheme-addons'),
			'jsonp' => __('Jsonp', 'quiktheme-addons'),
			'json5' => __('Json5', 'quiktheme-addons'),
			'julia' => __('Julia', 'quiktheme-addons'),
			'keyman' => __('Keyman', 'quiktheme-addons'),
			'kotlin' => __('Kotlin', 'quiktheme-addons'),
			'latex' => __('Latex', 'quiktheme-addons'),
			'less' => __('Less', 'quiktheme-addons'),
			'lilypond' => __('Lilypond', 'quiktheme-addons'),
			'liquid' => __('Liquid', 'quiktheme-addons'),
			'lisp' => __('Lisp', 'quiktheme-addons'),
			'livescript' => __('Livescript', 'quiktheme-addons'),
			'lolcode' => __('Lolcode', 'quiktheme-addons'),
			'lua' => __('Lua', 'quiktheme-addons'),
			'makefile' => __('Makefile', 'quiktheme-addons'),
			'markdown' => __('Markdown', 'quiktheme-addons'),
			'markup-templating' => __('Markup-templating', 'quiktheme-addons'),
			'matlab' => __('Matlab', 'quiktheme-addons'),
			'mel' => __('Mel', 'quiktheme-addons'),
			'mizar' => __('Mizar', 'quiktheme-addons'),
			'monkey' => __('Monkey', 'quiktheme-addons'),
			'n1ql' => __('N1ql', 'quiktheme-addons'),
			'n4js' => __('N4js', 'quiktheme-addons'),
			'nand2tetris-hdl' => __('Nand2tetris-hdl', 'quiktheme-addons'),
			'nasm' => __('Nasm', 'quiktheme-addons'),
			'nginx' => __('Nginx', 'quiktheme-addons'),
			'nim' => __('Nim', 'quiktheme-addons'),
			'nix' => __('Nix', 'quiktheme-addons'),
			'nsis' => __('Nsis', 'quiktheme-addons'),
			'objectivec' => __('Objectivec', 'quiktheme-addons'),
			'ocaml' => __('Ocaml', 'quiktheme-addons'),
			'opencl' => __('Opencl', 'quiktheme-addons'),
			'oz' => __('Oz', 'quiktheme-addons'),
			'parigp' => __('Parigp', 'quiktheme-addons'),
			'parser' => __('Parser', 'quiktheme-addons'),
			'pascal' => __('Pascal', 'quiktheme-addons'),
			'pascaligo' => __('Pascaligo', 'quiktheme-addons'),
			'pcaxis' => __('Pcaxis', 'quiktheme-addons'),
			'perl' => __('Perl', 'quiktheme-addons'),
			'php' => __('Php', 'quiktheme-addons'),
			'phpdoc' => __('Phpdoc', 'quiktheme-addons'),
			'php-extras' => __('Php-extras', 'quiktheme-addons'),
			'plsql' => __('Plsql', 'quiktheme-addons'),
			'powershell' => __('Powershell', 'quiktheme-addons'),
			'processing' => __('Processing', 'quiktheme-addons'),
			'prolog' => __('Prolog', 'quiktheme-addons'),
			'properties' => __('Properties', 'quiktheme-addons'),
			'protobuf' => __('Protobuf', 'quiktheme-addons'),
			'pug' => __('Pug', 'quiktheme-addons'),
			'puppet' => __('Puppet', 'quiktheme-addons'),
			'pure' => __('Pure', 'quiktheme-addons'),
			'python' => __('Python', 'quiktheme-addons'),
			'q' => __('Q', 'quiktheme-addons'),
			'qore' => __('Qore', 'quiktheme-addons'),
			'r' => __('R', 'quiktheme-addons'),
			'jsx' => __('Jsx', 'quiktheme-addons'),
			'tsx' => __('Tsx', 'quiktheme-addons'),
			'renpy' => __('Renpy', 'quiktheme-addons'),
			'reason' => __('Reason', 'quiktheme-addons'),
			'regex' => __('Regex', 'quiktheme-addons'),
			'rest' => __('Rest', 'quiktheme-addons'),
			'rip' => __('Rip', 'quiktheme-addons'),
			'roboconf' => __('Roboconf', 'quiktheme-addons'),
			'ruby' => __('Ruby', 'quiktheme-addons'),
			'rust' => __('Rust', 'quiktheme-addons'),
			'sas' => __('Sas', 'quiktheme-addons'),
			'sass' => __('Sass', 'quiktheme-addons'),
			'scss' => __('Scss', 'quiktheme-addons'),
			'scala' => __('Scala', 'quiktheme-addons'),
			'scheme' => __('Scheme', 'quiktheme-addons'),
			'shell-session' => __('Shell-session', 'quiktheme-addons'),
			'smalltalk' => __('Smalltalk', 'quiktheme-addons'),
			'smarty' => __('Smarty', 'quiktheme-addons'),
			'soy' => __('Soy', 'quiktheme-addons'),
			'splunk-spl' => __('Splunk-spl', 'quiktheme-addons'),
			'sql' => __('Sql', 'quiktheme-addons'),
			'stylus' => __('Stylus', 'quiktheme-addons'),
			'swift' => __('Swift', 'quiktheme-addons'),
			'tap' => __('Tap', 'quiktheme-addons'),
			'tcl' => __('Tcl', 'quiktheme-addons'),
			'textile' => __('Textile', 'quiktheme-addons'),
			'toml' => __('Toml', 'quiktheme-addons'),
			'tt2' => __('Tt2', 'quiktheme-addons'),
			'turtle' => __('Turtle', 'quiktheme-addons'),
			'twig' => __('Twig', 'quiktheme-addons'),
			'typescript' => __('Typescript', 'quiktheme-addons'),
			't4-cs' => __('T4-cs', 'quiktheme-addons'),
			't4-vb' => __('T4-vb', 'quiktheme-addons'),
			't4-templating' => __('T4-templating', 'quiktheme-addons'),
			'vala' => __('Vala', 'quiktheme-addons'),
			'vbnet' => __('Vbnet', 'quiktheme-addons'),
			'velocity' => __('Velocity', 'quiktheme-addons'),
			'verilog' => __('Verilog', 'quiktheme-addons'),
			'vhdl' => __('Vhdl', 'quiktheme-addons'),
			'vim' => __('Vim', 'quiktheme-addons'),
			'visual-basic' => __('Visual-basic', 'quiktheme-addons'),
			'wasm' => __('Wasm', 'quiktheme-addons'),
			'wiki' => __('Wiki', 'quiktheme-addons'),
			'xeora' => __('Xeora', 'quiktheme-addons'),
			'xojo' => __('Xojo', 'quiktheme-addons'),
			'xquery' => __('Xquery', 'quiktheme-addons'),
			'yaml' => __('Yaml', 'quiktheme-addons'),
		];
	}


    protected function _register_controls() {

		$this->start_controls_section(
			'_section_source_code',
			[
				'label' => __('Source Code', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'lng_type',
			[
				'label' => __('Language Type', 'quiktheme-addons'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'markup',
				'options' => $this->lng_type(),
			]
		);

		$this->add_control(
			'theme',
			[
				'label' => __('Theme', 'quiktheme-addons'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'prism',
				'options' => [
					'prism' => __('Default', 'quiktheme-addons'),
					'prism-coy' => __('Coy', 'quiktheme-addons'),
					'prism-dark' => __('Dark', 'quiktheme-addons'),
					'prism-funky' => __('Funky', 'quiktheme-addons'),
					'prism-okaidia' => __('Okaidia', 'quiktheme-addons'),
					'prism-solarizedlight' => __('Solarized light', 'quiktheme-addons'),
					'prism-tomorrow' => __('Tomorrow', 'quiktheme-addons'),
					'prism-twilight' => __('Twilight', 'quiktheme-addons'),
					'custom' => __('Custom Color', 'quiktheme-addons'),
				],
                'style_transfer' => true,
			]
		);

		$this->add_control(
			'source_code',
			[
				'label' => __('Source Code', 'quiktheme-addons'),
				'type' => Controls_Manager::CODE,
				'rows' => 20,
				'default' => '<p class="random-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>',
				'placeholder' => __('Source Code....', 'quiktheme-addons'),
				'condition' => [
					'lng_type!' => '',
				],
			]
		);
		$this->add_control(
			'copy_btn_text_show',
			[
				'label' => __('Copy Button Text Show?', 'quiktheme-addons'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
                'style_transfer' => true,
			]
		);
		$this->add_control(
			'copy_btn_text',
			[
				'label' => __('Copy Button Text', 'quiktheme-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 10,
				'default' => __('Copy to clipboard', 'quiktheme-addons'),
				'placeholder' => __('Copy Button Text', 'quiktheme-addons'),
				'condition' => [
					'copy_btn_text_show' => 'yes',
				],
			]
		);
		$this->add_control(
			'after_copy_btn_text',
			[
				'label' => __('After Copy Button Text', 'quiktheme-addons'),
				'type' => Controls_Manager::TEXT,
				'rows' => 10,
				'default' => __('Copied', 'quiktheme-addons'),
				'placeholder' => __('Copied', 'quiktheme-addons'),
				'condition' => [
					'copy_btn_text_show' => 'yes',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_source_code_custom_color',
			[
				'label' => __('Custom Color', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'theme' => 'custom',
				],
			]
		);
		$this->add_control(
			'custom_background',
			[
				'label' => __( 'Background Color', 'quiktheme-addons' ),
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
				'label' => __( 'Text Color', 'quiktheme-addons' ),
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
				'label' => __( 'Text shadow Color', 'quiktheme-addons' ),
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
				'label' => __( 'Slate Gray Color', 'quiktheme-addons' ),
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
				'label' => __( 'Dusty Gray Color', 'quiktheme-addons' ),
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
				'label' => __( 'Fresh Eggplant Color', 'quiktheme-addons' ),
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
				'label' => __( 'Limeade Color', 'quiktheme-addons' ),
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
				'label' => __( 'Sepia Skin Color', 'quiktheme-addons' ),
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
				'label' => __( 'Xanadu Color', 'quiktheme-addons' ),
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
				'label' => __( 'Deep Cerulean Color', 'quiktheme-addons' ),
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
				'label' => __( 'Cabaret Color', 'quiktheme-addons' ),
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
				'label' => __( 'Tangerine Color', 'quiktheme-addons' ),
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
				'label' => __('Style', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'source_code_box_height',
			[
				'label' => __('Height', 'quiktheme-addons'),
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
					'{{WRAPPER}} .quiktheme-source-code pre' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __('Box Border', 'quiktheme-addons'),
				'selector' => '{{WRAPPER}}  .quiktheme-source-code pre[class*="language-"]',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'box_border_radius',
			[
				'label' => __('Border Radius', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-source-code pre[class*="language-"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'source_code_box_padding',
			[
				'label' => __('Padding', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-source-code pre' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'source_code_box_margin',
			[
				'label' => __('Margin', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-source-code pre' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'copy_btn_color',
			[
				'label' => __( 'Copy Button Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-copy-code-button' => 'color: {{VALUE}}',
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
				'label' => __( 'Copy Button Background', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-copy-code-button' => 'background-color: {{VALUE}}',
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
		$this->add_render_attribute('quiktheme-code-wrap', 'class', 'quiktheme-source-code');
		$this->add_render_attribute('quiktheme-code-wrap', 'class', $theme);
		$this->add_render_attribute('quiktheme-code-wrap', 'data-lng-type', $settings['lng_type']);
		if ('yes' == $settings['copy_btn_text_show'] && $settings['after_copy_btn_text']) {
			$this->add_render_attribute('quiktheme-code-wrap', 'data-after-copy', $settings['after_copy_btn_text']);
		}
		$this->add_render_attribute('quiktheme-code', 'class', 'language-' . $settings['lng_type']);
		?>
		<?php if (!empty($source_code)): ?>
			<div <?php $this->print_render_attribute_string('quiktheme-code-wrap'); ?>>
			<pre>
			<?php if ('yes' == $settings['copy_btn_text_show'] && $settings['copy_btn_text']): ?>
				<button class="quiktheme-copy-code-button"><?php echo esc_html($settings['copy_btn_text']) ?></button>
			<?php endif; ?>
				<code <?php $this->print_render_attribute_string('quiktheme-code'); ?>>
					<?php echo esc_html($source_code); ?>
				</code>
			</pre>
			</div>
		<?php endif; ?>
		<?php

	}

}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Source_Code() );