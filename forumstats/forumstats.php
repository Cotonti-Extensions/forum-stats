<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=standalone
[END_COT_EXT]
==================== */

/**
 * Forum Statistics
 *
 * @package forumstats
 */

defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL');

require_once cot_incfile('forums', 'module');

$out['subtitle'] = Cot::$L['forumstats_title'];

$totalsections = Cot::$db->countRows($db_forum_stats); // remake
$totaltopics = Cot::$db->countRows($db_forum_topics);
$totalposts = Cot::$db->countRows($db_forum_posts);

$sql = Cot::$db->query("SELECT SUM(fs_viewcount) FROM $db_forum_stats");
$totalviews = $sql->fetchColumn();

$sql = Cot::$db->query("SELECT * FROM $db_forum_topics WHERE 1 ORDER BY ft_postcount DESC LIMIT 10");
$ii = 0;

while ($row = $sql->fetch()) {
	if (cot_auth('forums', $row['ft_cat'], 'R')) {
		$ii++;
		$ft_title = $row['ft_title'];
		$ft_title .= ($row['ft_sticky']) ? " (*)" : '';
		$ft_title .= ($row['ft_state']) ? " (x)" : '';

        $topicPreview = '';
        if (!empty($row['ft_preview'])) {
            $allowBBCodes = isset(Cot::$cfg['forums']['cat_' . $row['ft_cat']]) ?
                Cot::$cfg['forums']['cat_' . $row['ft_cat']]['allowbbcodes'] :
                Cot::$cfg['forums']['cat___default']['allowbbcodes'];
            $topicPreview = trim(cot_parse($row['ft_preview'], $allowBBCodes));
            if (!empty($topicPreview)) {
                $topicPreview .= '...';
            }
        }

		$t->assign([
			'FORUMSTATS_REPLIEDTOP_II' => $ii,
			'FORUMSTATS_REPLIEDTOP_FORUMS' => cot_breadcrumbs(cot_forums_buildpath($row['ft_cat'], false), false, false),
			'FORUMSTATS_REPLIEDTOP_URL' => cot_url('forums', 'm=posts&q='.$row['ft_id']),
			'FORUMSTATS_REPLIEDTOP_TITLE' => htmlspecialchars($ft_title),
            'FORUMSTATS_REPLIEDTOP_DESC' => htmlspecialchars($row['ft_desc']),
            'FORUMSTATS_REPLIEDTOP_PREVIEW' => htmlspecialchars(strip_tags($topicPreview)),
			'FORUMSTATS_REPLIEDTOP_POSTCOUNT' => $row['ft_postcount'],
		]);
		$t->parse('MAIN.FORUMSTATS_REPLIEDTOP_USER');
	} else {
		$ii++;
		$t->assign([
			'FORUMSTATS_REPLIEDTOP_II' => $ii,
			'FORUMSTATS_REPLIEDTOP_FORUMS' => cot_breadcrumbs(cot_forums_buildpath($row['ft_cat'], false), false),
			'FORUMSTATS_REPLIEDTOP_POSTCOUNT' => $row['ft_postcount'],
		]);
		$t->parse('MAIN.FORUMSTATS_REPLIEDTOP_NO_USER');
	}
}
$sql->closeCursor();

$sql = Cot::$db->query("SELECT * FROM $db_forum_topics WHERE 1 ORDER BY ft_viewcount DESC LIMIT 10");

$ii = 0;
while ($row = $sql->fetch()) {
	if (cot_auth('forums', $row['ft_cat'], 'R')) {
		$ii++;
		$ft_title = $row['ft_title'];
		$ft_title .= ($row['ft_sticky'] && $row['ft_state']) ? " (!)" : '';
		$ft_title .= ($row['ft_sticky'] && !$row['ft_state']) ? " (*)" : '';
		$ft_title .= ($row['ft_state'] && !$row['ft_sticky']) ? " (x)" : '';

        $topicPreview = '';
        if (!empty($row['ft_preview'])) {
            $allowBBCodes = isset(Cot::$cfg['forums']['cat_' . $row['ft_cat']]) ?
                Cot::$cfg['forums']['cat_' . $row['ft_cat']]['allowbbcodes'] :
                Cot::$cfg['forums']['cat___default']['allowbbcodes'];
            $topicPreview = trim(cot_parse($row['ft_preview'], $allowBBCodes));
            if (!empty($topicPreview)) {
                $topicPreview .= '...';
            }
        }

		$t->assign([
			'FORUMSTATS_VIEWEDTOP_II' => $ii,
			'FORUMSTATS_VIEWEDTOP_FORUMS' => cot_breadcrumbs(cot_forums_buildpath($row['ft_cat'], false), false, false),
			'FORUMSTATS_VIEWEDTOP_URL' => cot_url('forums', 'm=posts&q='.$row['ft_id']),
			'FORUMSTATS_VIEWEDTOP_TITLE' => htmlspecialchars($ft_title),
            'FORUMSTATS_VIEWEDTOP_DESC' => htmlspecialchars($row['ft_desc']),
            'FORUMSTATS_VIEWEDTOP_PREVIEW' => htmlspecialchars(strip_tags($topicPreview)),
			'FORUMSTATS_VIEWEDTOP_VIEWCOUNT' => $row['ft_viewcount'],
		]);
		$t->parse('MAIN.FORUMSTATS_VIEWEDTOP_USER');
	} else {
		$ii++;
		$t->assign([
			'FORUMSTATS_VIEWEDTOP_II' => $ii,
			'FORUMSTATS_VIEWEDTOP_FORUMS' => cot_breadcrumbs(cot_forums_buildpath($row['ft_cat'], false), false),
			'FORUMSTATS_VIEWEDTOP_VIEWCOUNT' => $row['ft_viewcount'],
		]);
		$t->parse('MAIN.FORUMSTATS_VIEWEDTOP_NO_USER');
	}
}
$sql->closeCursor();

$ii = 0;
$tmpstats = '';
$sql = Cot::$db->query('SELECT * FROM ' . Cot::$db->users . ' WHERE 1 ORDER by user_postcount DESC LIMIT 10');
while ($row = $sql->fetch()) {
	$ii++;
    $t->assign(cot_generate_usertags($row, 'FORUMSTATS_POSTERSTOP_USER_'));
	$t->assign([
		'FORUMSTATS_POSTERSTOP_II' => $ii,
		'FORUMSTATS_POSTERSTOP_USER_POSTCOUNT' => $row['user_postcount'],
	]);
	$t->parse('MAIN.POSTERSTOP');
}
$sql->closeCursor();

$forumStatsBreadcrumbs = cot_breadcrumbs(
    [[cot_url('forums'), Cot::$L['Forums']], [cot_url('plug', ['e' => 'forumstats']),Cot::$L['forumstats_title']]],
    Cot::$cfg['homebreadcrumb']
);

$t->assign([
    'FORUMSTATS_BREADCRUMBS' => $forumStatsBreadcrumbs,
	'FORUMSTATS_TOTALSECTIONS' => $totalsections,
	'FORUMSTATS_TOTALTOPICS' => $totaltopics,
	'FORUMSTATS_TOTALPOSTS' => $totalposts,
	'FORUMSTATS_TOTALVIEWS' => $totalviews,
]);
