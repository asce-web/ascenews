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

import { SelectCptTaxonomy } from '../_components/select-cpt-taxonomy';
import { SitemapCheckboxControl } from '../_components/checkbox';

//import Select from 'react-select';

//  Import core block libraries
const { __ } = wp.i18n;
const { InspectorControls } = wp.blockEditor;
const {
	PanelBody,
	PanelRow,
	ServerSideRender,
	TextControl,
	RadioControl,
	SelectControl,
	ColorPicker
} = wp.components;
const { registerBlockType } = wp.blocks;
const { Fragment } = wp.element;

/**
 * Register block
 */
export default registerBlockType(
	'wpgoplugins/simple-sitemap-group-block',
	{
		title: 'Simple Sitemap Group',
		icon: 'networking',
		category: 'simple-sitemap',
		attributes: {
			show_excerpt: {
				type: 'boolean',
				default: false,
			},
			show_label: {
				type: 'boolean',
				default: true,
			},
			links: {
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
			block_taxonomy: {
				type: 'string',
				default: 'category',
			},
			gutenberg_block: {
				type: 'boolean',
				default: true,
			}
		},
		edit: props => {

			const { attributes: { show_excerpt, show_label, links, block_taxonomy, order, orderby }, className, setAttributes, isSelected, attributes } = props;

			function updateShowExcerpt(isChecked) {
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
						<PanelRow className="simple-sitemap">
							<label style={{ marginBottom: '-12px', maxWidth: '100%' }} class="components-base-control__label" >Select post taxonomy</label>
						</PanelRow>
						<PanelRow className="simple-sitemap">
							<SelectCptTaxonomy setAttributes={setAttributes} multi={false} block_taxonomy={block_taxonomy} />
						</PanelRow>
						<PanelRow>
							<p style={{ marginTop: '-24px', fontSize: '13px', fontStyle: 'italic', marginLeft: '2px' }}>List <a href="https://wpgoplugins.com/plugins/simple-sitemap-pro/#taxonomies-for-any-post-type" target="_blank">taxonomies</a> for any post type</p>
						</PanelRow>
						<PanelRow className="simple-sitemap order-label">
							<label style={{ marginBottom: '-12px', maxWidth: '100%' }} class="components-base-control__label" >Post ordering</label>
						</PanelRow>
						<PanelRow className="simple-sitemap order mb20">
							<SelectControl
								label="Orderby"
								value={orderby}
								options={[
									{ label: 'Title', value: 'title' },
									{ label: 'Date', value: 'date' },
									{ label: 'ID', value: 'ID' },
									{ label: 'Author', value: 'author' },
									{ label: 'Name', value: 'name' },
									{ label: 'Modified', value: 'modified' }
								]}
								onChange={(value) => { setAttributes({ orderby: value }) }}
							/>
							<SelectControl
								label="Order"
								value={order}
								options={[
									{ label: 'Ascending', value: 'asc' },
									{ label: 'Descending', value: 'desc' }
								]}
								onChange={(value) => { setAttributes({ order: value }) }}
							/>
						</PanelRow>
						<PanelRow className="simple-sitemap general-chk">
							<SitemapCheckboxControl value={show_excerpt} label="Display post excerpt" updateCheckbox={updateShowExcerpt} />
						</PanelRow>
						<PanelRow className="simple-sitemap general-chk">
							<SitemapCheckboxControl value={show_label} label="Display post type label" updateCheckbox={updateShowLabel} />
						</PanelRow>
						<PanelRow className="simple-sitemap general-chk">
							<SitemapCheckboxControl value={links} label="Display sitemap links" updateCheckbox={updateLinks} />
						</PanelRow>
					</PanelBody>
				</InspectorControls>,
				<ServerSideRender
					block="wpgoplugins/simple-sitemap-group-block"
					attributes={attributes}
				/>
			];
		},
		save: function () {
			return null;
		}
	}
);