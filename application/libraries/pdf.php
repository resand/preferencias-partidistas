<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');

class Pdf extends FPDF
{
	function __construct($orientation ='L', $unit = 'mm', $size = 'Letter')
    {
        // Call parent constructor
        parent::__construct($orientation,$unit,$size);
        $this->fontpath='fonts/';
    }
  
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);

        $this->MultiCell($w,5,$data[$i],0,$a,'true');
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function Row2($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);

        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

// function Header()
// {
//     $this->SetFont('Arial','B',14);
//     $this->Line(10,8,206,8);
//     $this->Line(10,30,206,30);
//     $this->Cell(30,25,'',0,0,'C',$this->Image(base_url('media/Tohbeh-logotipo.png'), 162,12,45));
//     $this->Cell(111,25,'Reporte de Ventas',0,0,'C');
//     //$this->Cell(111,40,'Reportes de Ventas',0,0,'C',$this->Image(base_url('media/Tohbeh-logotipo.png'),10,10,22));
//     $this->Cell(-110,10,utf8_decode('Toh Beh Expeditions'),10,10,'C');
//     $this->Ln(20);
// }

function Header_Vertical()
{
    $this->Cell(75, 25, $this->Image('images/prd-logo.png', 20, 20, 30));
}

function Header_Horizontal($titulo)
{
    $this->SetFont('Arial','B',14);
    $this->Line(10,8,268,8);
    $this->Line(10,30,268,30);
    $this->Cell(75,25, $this->Image('media/Tohbeh-logotipo.png', 10,12,45));
    $this->Cell(155,-25,utf8_decode($titulo['principal']),0,10,'C');
    $this->Cell(155,35,utf8_decode($titulo['secundario']),0,1,'C');
}

function Footer()
{
    $this->SetY(-18);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    //$this->Cell(0,10,utf8_decode('Página: ').$this->PageNo(),0,0,'L');
    //$this->Ln(3);
    $this->Cell(0,10,utf8_decode('Fecha de Impresión: ').date('d-m-Y'),'T',0,'L');
}

}


?>