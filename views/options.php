<?php if ( $flash ){ ?>
	<div id="message" class="<?php echo $flash['type'] ?> fade">
		<p><strong><?php echo $flash['text'] ?></strong></p>
	</div>
<?php } ?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2> <?php _e("Indexing Settings") ?> </h2>
	<p> 
		<?php _e("By correctly configuring those options, your content will appear on search results and content suggestions across others sites on the 'Santa Rede'.") ?>
	</p>
	<p>
		<?php _e("Information on how to properly configure those options can be obtained with the Development crew at Canção Nova.") ?>
	</p>

	<h3 class="title"> <?php _e("Server Configuration") ?> </h3>
	<form action="" method="post" id="searchcn_conf">
		<table class="form-table">
			<tbody>
				
				<tr valign="top">
					<th scope="row"><label for="indexer_url"> <?php _e("Indexer URL") ?> </label></th>
					<td>
						<input name="indexer_url" type="text" id="indexer_url" class="regular-text code" 
							value="<?php echo $indexer_url ?>" >
						<br/>
						<span class="description"> 
							<?php _e("the address where the indexing server can be found.") ?>
						</span>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="reindex_all_sites"> <?php _e("Schedule Re-index") ?> </label></th>
					<td>
						<input name="reindex_all_sites" type="checkbox" id="reindex_all_sites" class="regular-text code" 
							value="reindex_all_sites" > <?php _e("Re-index all posts from all sites on this network.") ?>
						<br/>
						<span class="description"> 
							<?php _e("this may take a while, depending on the size of your network.") ?><br/>
							<?php _e("during this time, your sites may experience slowdown or unreability on your sites.") ?><br/>
							<?php _e("please discuss this proccess with your hosting provider beforehand.") ?>
						</span>
					</td>
				</tr>

			</tbody>
		</table>
		<?php wp_nonce_field('searchcn_update_options') ?>
		
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" 
				value="<?php _e("Save Changes")?>">
		</p>

	</form>

</div>