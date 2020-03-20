// BLOCK DEPENDENCIES

// Import chart components/objects
//import attributes from './components/attributes';
//import BarChart from './components/bar-chart';
//import InspectorPanel from './components/inspector-panel';
//import IsSelected from './components/is-selected';
//import BlockAlignToolbar from '../_shared-components/block-align-toolbar';

// Import libraries and functionality
//import classnames from 'classnames';

// Import styles and media assets
//import customIcon from './components/icon';
//import './styles/style.scss';
//import './styles/editor.scss';

import Select from 'react-select';
import { SitemapCheckboxControl } from '../_components/checkbox';

//  Import core block libraries
const { __ } = wp.i18n;
const { InspectorControls } = wp.blockEditor;
const {
	PanelBody,
	PanelRow,
	ServerSideRender,
	TextControl,
	RadioControl,
	SelectControl
} = wp.components;
const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;

/**
 * Register block
 */
export default registerBlockType(
	'wpgoplugins/simple-sitemap-block',
	{
		title: 'Simple Sitemap',
		icon: 'editor-ul',
		category: 'simple-sitemap',
		attributes: {
			render_tab: {
				type: 'boolean',
				default: false,
			},
			gutenberg_block: {
				type: 'boolean',
				default: true,
			},
			orderby: {
				type: 'string',
				default: 'title'
			},
			order: {
				type: 'string',
				default: 'asc'
			},
			block_post_types: {
				type: 'string',
				default: '[{ "value": "page", "label": "Page" }]',
			},
			page_depth: {
				type: 'number',
				default: 0
			},
			show_excerpt: {
				type: 'boolean',
				default: false
			},
			show_label: {
				type: 'boolean',
				default: true
			},
			links: {
				type: 'boolean',
				default: true
			}
		},
		edit: props => {
			const { attributes: { show_excerpt, show_label, links, page_depth, nofollow, image, list_icon, max_width, responsive_breakpoint, sitemap_container_margin, sitemap_item_line_height, tab_color, tab_header_bg, post_type_label_padding, post_type_label_font_size, render_tab, block_post_types, exclude, include, order, orderby }, className, setAttributes, isSelected, attributes } = props;

			//const defaultValue = JSON.parse(props.attributes.block_post_types);
			//console.log(defaultValue);
			//console.log(typeof props.attributes.block_post_types, props.attributes.block_post_types);
			//console.log(JSON.parse(props.attributes.block_post_types));

			function updateToggleTabs(isChecked) {
				setAttributes({ render_tab: isChecked });
			}

			function updateExcerpt(isChecked) {
				setAttributes({ show_excerpt: isChecked });
			}

			function updateShowLabel(isChecked) {
				setAttributes({ show_label: isChecked });
			}

			function updateLinks(isChecked) {
				setAttributes({ links: isChecked });
			}

			return [
				<InspectorControls>
					<PanelBody title={__('General Settings', 'simple-sitemap')}>
						<PanelRow>
							<label style={{ marginBottom: '-14px' }} class="components-base-control__label" >Select post types to display</label>
						</PanelRow>
						<PanelRow>
							<Select
								label="Title"
								defaultValue={JSON.parse(props.attributes.block_post_types)}
								isMulti
								onChange={(value) => {
									return props.setAttributes({ block_post_types: JSON.stringify(value) });
								}}
								options={[
									{ value: 'post', label: 'Post' },
									{ value: 'page', label: 'Page' }
								]}
							/>
						</PanelRow>
						<PanelRow>
							<p style={{ marginTop: '-20px', fontSize: '13px', fontStyle: 'italic', marginLeft: '2px' }}>List <a href="https://wpgoplugins.com/plugins/simple-sitemap-pro/#post-types" target="_blank">more</a> post types</p>
						</PanelRow>
						<PanelRow className="simple-sitemap order mb20">
							<SelectControl
								label="Orderby"
								value={props.attributes.orderby}
								options={[
									{ label: 'Title', value: 'title' },
									{ label: 'Date', value: 'date' },
									{ label: 'ID', value: 'ID' },
									{ label: 'Author', value: 'author' },
									{ label: 'Name', value: 'name' },
									{ label: 'Modified', value: 'modified' }
								]}
								onChange={(value) => { props.setAttributes({ orderby: value }) }}
							/>
							<SelectControl
								label="Order"
								value={props.attributes.order}
								options={[
									{ label: 'Ascending', value: 'asc' },
									{ label: 'Descending', value: 'desc' }
								]}
								onChange={(value) => { props.setAttributes({ order: value }) }}
							/>
						</PanelRow>
						<PanelRow className="simple-sitemap general-chk">
							<SitemapCheckboxControl value={show_excerpt} label="Show excerpt" updateCheckbox={updateExcerpt} />
						</PanelRow>
						<PanelRow className="simple-sitemap general-chk">
							<SitemapCheckboxControl value={show_label} label="Show post type label" updateCheckbox={updateShowLabel} />
						</PanelRow>
						<PanelRow className="simple-sitemap general-chk">
							<SitemapCheckboxControl value={links} label="Enable sitemap links" updateCheckbox={updateLinks} />
						</PanelRow>
					</PanelBody>
					<PanelBody title={__('Tab Settings', 'simple-sitemap')} initialOpen={false}>
						<PanelRow className="simple-sitemap">
							<SitemapCheckboxControl value={render_tab} label="Enable tabs" updateCheckbox={updateToggleTabs} />
						</PanelRow>
					</PanelBody>
					<PanelBody title={__('Page Settings', 'simple-sitemap')} initialOpen={false}>
						<PanelRow className="simple-sitemap">
							<p>Affects sitemap pages only.</p>
						</PanelRow>
						<PanelRow className="simple-sitemap">
							<TextControl
								type="number"
								label="Page indentation"
								min="0"
								max="5"
								help="Leave at zero for auto-depth"
								value={page_depth}
								onChange={(value) => { setAttributes({ page_depth: parseInt(value) }); }}
							/>
						</PanelRow>
					</PanelBody>
				</InspectorControls>,
				<ServerSideRender
					block="wpgoplugins/simple-sitemap-block"
					attributes={props.attributes}
				/>
			];
		},
		save: function () {
			return null;
		}
	}
);