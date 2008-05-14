<?php
$solr = new ezcSearchSolrHandler;
$session = new ezcSearchSession( $solr, new ezcSearchEmbeddedManager() );
$q = $session->createFindQuery( 'ezcSearchSimpleArticle' );
$searchWords = split( ' ', $searchWord );
foreach( $searchWords as $searchWord )
{
	$q->where( $q->eq( 'body', $searchWord ) )
	  ->where( $q->eq( 'title', $searchWord ) );
}
$q->facet( 'type' )
  ->limit( 10, $begin );
$r = $session->find( $q );
?>
