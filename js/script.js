(function() {
	tinymce.PluginManager.add('ldg_embed_button', function(editor, url) {
		editor.addButton('ldg_embed_button', {
			title: editor.getLang('ldg_embed_button.button_title'),
			icon: 'icon dashicons-format-video',
			onclick: function() {
				editor.windowManager.open({
					title: editor.getLang('ldg_embed_button.window_title'),
					body: [{
						type: 'textbox',
						name: 'embedUrl',
						label: 'Url',
						value: ''
					}, {
						type: 'textbox',
						subtype: 'number',
						name: 'embedWidth',
						label: 'Width',
						value: ''
					}, {
						type: 'textbox',
						subtype: 'number',
						name: 'embedHeight',
						label: 'Height',
						value: ''
					}, ],
					onsubmit: function(e) {
						var width = (e.data.embedWidth) ? ' width="'+e.data.embedWidth+'"': '';
						var height = (e.data.embedHeight) ? ' height="'+e.data.embedHeight+'"': '';

						editor.insertContent(
							'[embed'+width+height+']'+e.data.embedUrl+'[/embed]'
						);
					}
				});
			}
		});
	});
})();