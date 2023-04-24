<?php // content="text/plain; charset=utf-8"
require_once ('../../chart/phpgraphlib-master/examples/jpgraph.php');
require_once ('../../chart/phpgraphlib-master/examples/jpgraph_bar.php');
//require_once ('../../chart/phpgraphlib-master/examples/jpgraph_line.php');
//require_once ('../../chart/phpgraphlib-master/examples/jpgraph_log.php');
include('connect.php');
$nn2 = $_GET['year'];


$year = $_GET['year']; 

							$jan = 0;

							$feb = 0;

							$mar = 0;

							$apr = 0;

							$may = 0;

							$jun = 0;

							$jul = 0;

							$aug = 0;

							$sep = 0;

							$oct = 0;

							$nov = 0; 

							$dec = 0;

							
                            $result = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='01' AND  Year(date)=:d3");

			               	$result->bindParam(':d3', $year);

                            $result->execute();

							for($i=0; $row = $result->fetch(); $i++){

							$jan = $row['sum(profit)'];

                            }

								  $result1 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='02' AND  Year(date)=:d3");

			               	$result1->bindParam(':d3', $year);

                            $result1->execute();

							for($i=0; $row1 = $result1->fetch(); $i++){

							$feb = $row1['sum(profit)'];

                            }

								  $result2 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='03' AND  Year(date)=:d3");

			               	$result2->bindParam(':d3', $year);

                            $result2->execute();

							for($i=0; $row2 = $result2->fetch(); $i++){

							$mar = $row2['sum(profit)'];

                             }

								  $result3 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='04' AND  Year(date)=:d3");

			               	$result3->bindParam(':d3', $year);

                            $result3->execute();

							for($i=0; $row3 = $result3->fetch(); $i++){

							$apr = $row3['sum(profit)'];

                            }

							$result4 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='05' AND  Year(date)=:d3");

			               	$result4->bindParam(':d3', $year);

                            $result4->execute();

							for($i=0; $row4 = $result4->fetch(); $i++){

							$may = $row4['sum(profit)'];

                            }

							 $result5 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='06' AND  Year(date)=:d3");

			               	$result5->bindParam(':d3', $year);

                            $result5->execute();

							for($i=0; $row5 = $result5->fetch(); $i++){

							$jun = $row5['sum(profit)'];

                            }

							 $result6 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='07' AND  Year(date)=:d3");

			               	$result6->bindParam(':d3', $year);

                            $result6->execute();

							for($i=0; $row6 = $result6->fetch(); $i++){

							$jul = $row6['sum(profit)'];

                            }

							 $result7 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='08' AND  Year(date)=:d3");

			               	$result7->bindParam(':d3', $year);

                            $result7->execute();

							for($i=0; $row7 = $result7->fetch(); $i++){

							$aug = $row7['sum(profit)'];

                            }

							 $result8 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='09' AND  Year(date)=:d3");

			               	$result8->bindParam(':d3', $year);

                            $result8->execute();

							for($i=0; $row8 = $result8->fetch(); $i++){

							$sep = $row8['sum(profit)'];

                            }

							 $result9 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='10' AND  Year(date)=:d3");

			               	$result9->bindParam(':d3', $year);

                            $result9->execute();

							for($i=0; $row9 = $result9->fetch(); $i++){

							$oct = $row9['sum(profit)'];

                            }

							 $result10 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='11' AND  Year(date)=:d3");

			               	$result10->bindParam(':d3', $year);

                            $result10->execute();

							for($i=0; $row10 = $result10->fetch(); $i++){

							$nov = $row10['sum(profit)'];

                            }

							 $result11 = $db->prepare("SELECT date,sum(profit) FROM sales_order WHERE month(date)='12' AND  Year(date)=:d3");

			               	$result11->bindParam(':d3', $year);

                            $result11->execute();

							for($i=0; $row11 = $result11->fetch(); $i++){

							$dec = $row11['sum(profit)'];

                            }



$datay = array($jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec);

// Create the graph. These two calls are always required
$graph = new Graph(750,350);
$graph->clearTheme();
$graph->SetScale('textlin');

// Add a drop shadow
$graph->SetShadow(1);

// Adjust the margin a bit to make more room for titles
$graph->SetMargin(80,60,50,70);

// Create a bar pot
$bplot = new BarPlot($datay);

// Adjust fill color

$bplot->SetFillColor('gray');
$bplot->SetWidth(0.7);
$graph->Add($bplot);

$graph->ygrid->Show(true,true);
$graph->xgrid->Show(true,false);
$graph->ygrid->SetColor("blue");

// Setup the titles
$graph->title->Set('Profit over sale on cost Analysis');
$graph->xaxis->title->Set('X-title');
$graph->yaxis->title->Set('Y-title');
//color axis
$graph->yaxis->SetColor("black");
$graph->yaxis->SetWeight(1);
$graph->SetShadow();
// Display the graph
$graph->Stroke();
?>
