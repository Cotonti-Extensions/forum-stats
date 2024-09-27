<!-- BEGIN: MAIN -->
<div class="block">
	<h2 class="stats">{FORUMSTATS_BREADCRUMBS}</h2>
	<h1>{PHP.L.forumstats_title}</h1>
	<table class="cells">
		<tr>
			<td class="width90">{PHP.L.forumstats_sections}:</td>
			<td class="centerall width10">{FORUMSTATS_TOTALSECTIONS}</td>
		</tr>
		<tr>
			<td>{PHP.L.forumstats_topics}:</td>
			<td class="centerall">{FORUMSTATS_TOTALTOPICS}</td>
		</tr>
		<tr>
			<td>{PHP.L.forumstats_posts}:</td>
			<td class="centerall">{FORUMSTATS_TOTALPOSTS}</td>
		</tr>
		<tr>
			<td>{PHP.L.forumstats_views}:</td>
			<td class="centerall">{FORUMSTATS_TOTALVIEWS}</td>
		</tr>
	</table>

	<table class="cells margintop10">
		<thead>
			<tr>
				<th colspan="2" class="textleft"><h3>{PHP.L.forumstats_repliedtop10}</h3></th>
				<th class="textcenter">{PHP.L.forumstats_postsShort}</th>
			</tr>
		</thead>
		<!-- BEGIN: FORUMSTATS_REPLIEDTOP_USER -->
		<tr>
			<td class="centerall width5">{FORUMSTATS_REPLIEDTOP_II}.</td>
			<td class="width85">
				<h3 style="margin: 0"><a href="{FORUMSTATS_REPLIEDTOP_URL}">{FORUMSTATS_REPLIEDTOP_TITLE}</a></h3>
				<!-- IF {FORUMSTATS_REPLIEDTOP_DESC} --><div>{FORUMSTATS_REPLIEDTOP_DESC}</div><!-- ENDIF -->
				{FORUMSTATS_REPLIEDTOP_FORUMS}
				<!-- IF {FORUMSTATS_REPLIEDTOP_PREVIEW} --><div class="desc lhn">{FORUMSTATS_REPLIEDTOP_PREVIEW}</div><!-- ENDIF -->
			</td>
			<td class="centerall width10">{FORUMSTATS_REPLIEDTOP_POSTCOUNT}</td>
		</tr>
		<!-- END: FORUMSTATS_REPLIEDTOP_USER -->
		<!-- BEGIN: FORUMSTATS_REPLIEDTOP_NO_USER -->
		<tr>
			<td class="centerall width5">{FORUMSTATS_REPLIEDTOP_II}.</td>
			<td class="width85">{FORUMSTATS_REPLIEDTOP_FORUMS} {PHP.cfg.separator} {PHP.L.forumstats_hidden}</td>
			<td class="centerall width10">{FORUMSTATS_REPLIEDTOP_POSTCOUNT}</td>
		</tr>
		<!-- END: FORUMSTATS_REPLIEDTOP_NO_USER -->
	</table>

	<table class="cells margintop10">
		<thead>
			<tr>
				<th colspan="2" class="textleft"><h3>{PHP.L.forumstats_viewedtop10}</h3></th>
				<th class="textcenter">{PHP.L.forumstats_viewsShort}</th>
			</tr>
		</thead>
		<!-- BEGIN: FORUMSTATS_VIEWEDTOP_USER -->
		<tr>
			<td class="centerall width5">{FORUMSTATS_VIEWEDTOP_II}.</td>
			<td class="width85">
				<h3 style="margin: 0"><a href="{FORUMSTATS_VIEWEDTOP_URL}">{FORUMSTATS_VIEWEDTOP_TITLE}</a></h3>
				<!-- IF {FORUMSTATS_VIEWEDTOP_DESC} --><div>{FORUMSTATS_VIEWEDTOP_DESC}</div><!-- ENDIF -->
				{FORUMSTATS_VIEWEDTOP_FORUMS}
				<!-- IF {FORUMSTATS_VIEWEDTOP_PREVIEW} --><div class="desc lhn">{FORUMSTATS_VIEWEDTOP_PREVIEW}</div><!-- ENDIF -->
			</td>
			<td class="centerall width10">{FORUMSTATS_VIEWEDTOP_VIEWCOUNT}</td>
		</tr>
		<!-- END: FORUMSTATS_VIEWEDTOP_USER -->
		<!-- BEGIN: FORUMSTATS_VIEWEDTOP_NO_USER -->
		<tr>
			<td class="centerall width5">{FORUMSTATS_VIEWEDTOP_II}.</td>
			<td class="width85">{FORUMSTATS_VIEWEDTOP_FORUMS} {PHP.cfg.separator} {PHP.L.forumstats_hidden}</td>
			<td class="centerall width10">{FORUMSTATS_VIEWEDTOP_VIEWCOUNT}</td>
		</tr>
		<!-- END: FORUMSTATS_VIEWEDTOP_NO_USER -->
	</table>

	<table class="cells">
		<thead>
			<tr>
				<th colspan="2" class="textleft"><h3>{PHP.L.forumstats_posterstop10}</h3></th>
				<th class="textcenter">{PHP.L.forumstats_postsShort}</th>
			</tr>
		</thead>
		<!-- BEGIN: POSTERSTOP -->
		<tr>
			<td class="centerall width5">{FORUMSTATS_POSTERSTOP_II}.</td>
			<td class="width85">
				<a href="{FORUMSTATS_POSTERSTOP_USER_DETAILS_URL}">{FORUMSTATS_POSTERSTOP_USER_FULL_NAME}</a>
				<!-- IF {FORUMSTATS_POSTERSTOP_USER_FULL_NAME} !== {FORUMSTATS_POSTERSTOP_USER_NICKNAME} -->
				({FORUMSTATS_POSTERSTOP_USER_NICKNAME})
				<!-- ENDIF -->
			</td>
			<td class="centerall width10">{FORUMSTATS_POSTERSTOP_USER_POSTCOUNT}</td>
		</tr>
		<!-- END: POSTERSTOP -->
	</table>
</div>
<!-- END: MAIN -->