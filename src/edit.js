import {InspectorControls, useBlockProps} from '@wordpress/block-editor';
import { useEntityProp } from '@wordpress/core-data';

import './editor.scss';
import {PanelBody, SelectControl} from "@wordpress/components";
import {useEffect, useState} from "@wordpress/element";

export default function Edit({ attributes, setAttributes, context: { postType, postId }}) {
	const { selectedMeta } = attributes;

	const [ meta ] = useEntityProp(
		'postType',
		postType,
		'meta',
		postId
	);

	const options = Object.keys(meta)
		.filter((opt) => /_post_stats_[a-z]+/.test(opt))
		.reduce((acc,current) => {
			const arr = current.split('_');
			const name = arr[arr.length - 1];
			const capitalized = name.charAt(0).toUpperCase() + name.slice(1);

			return [ ...acc, { label: capitalized, value: current } ]
		}, []);

	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody title="Post Meta Settings">
					<SelectControl
						label="Meta Key"
						value={ selectedMeta }
						options={ options }
						onChange={ ( selectedMeta ) => setAttributes( { selectedMeta } ) }
						__nextHasNoMarginBottom
					/>
				</PanelBody>
			</InspectorControls>

			{meta[selectedMeta]}
		</div>
	);
}
