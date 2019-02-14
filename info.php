<?php

error_reporting(0);

/*
 * @Author : Akin
 * @Team : IndoSec, Black coder crush
 * @Date : Fri Feb 15 00:51:26 WIB 2019
 *
 * Jan Di Recode Yah:)
 * Kalo Mau Di Pelajari dari script ini boleh kok :)
 * Hanya script sederhana
*/

class Gempa
{
	private $red = "\033[91m",
		$green = "\033[92m",
		$yellow = "\033[93m",
		$blue = "\033[94m",
		$magenta = "\033[95m",
		$cyan = "\033[96m",
		$white = "\033[97m",
		$normal = "\033[0m";
	public function __construct()
	{
		$this->banner();
		$this->printInfo();
	}
	// banner
	public function banner()
	{
		$this->batas(57);
		echo "{$this->green} ___        __        {$this->cyan}  ____ \n";
		echo "{$this->green}|_ _|_ __  / _| ___   {$this->cyan} / ___|  ___ _ __ ___  _ __   __ _ \n";
		echo "{$this->green} | || '_ \| |_ / _ \  {$this->cyan} | |  _ / _ \ '_ ` _ \| '_ \ / _` | \n";
		echo "{$this->green} | || | | |  _| (_) | {$this->cyan} | |_| |  __/ | | | | | |_) | (_| | \n";
		echo "{$this->green}|___|_| |_|_|  \___/  {$this->cyan} \____|\____|_| |_| |_| .__/ \__,_| \n";
		echo "{$this->green}                      {$this->cyan}                      |_| \n";
		$this->batas(57);
		echo "\n";
	}
	private function batas($count)
	{
		for ($pembatas = 0; $pembatas < $count; $pembatas++) {
			echo "{$this->normal}={$this->normal}";
		}
		echo "\n";
	}
	// get info gempa
	private function printInfo()
	{
		$this->getInfo = file_get_contents("http://data.bmkg.go.id/lastgempadirasakan.xml");
		// parse xml
		$this->data = simplexml_load_string($this->getInfo) or die("error: cannot create object");
		// save variable
		$this->tanggal = $this->data->Gempa->Tanggal;
		$this->jam = $this->data->Gempa->Jam;
		$this->lintang = $this->data->Gempa->Lintang;
		$this->bujur = $this->data->Gempa->Bujur;
		$this->magnitude = $this->data->Gempa->Magnitude;
		$this->kedalaman = $this->data->Gempa->Kedalaman;
		$this->keterangan = $this->data->Gempa->Keterangan;
		$this->dirasakan = $this->data->Gempa->Dirasakan;
		// print info
		echo "{$this->green}Tanggal {$this->cyan}:{$this->yellow} {$this->tanggal} \n";
		echo "{$this->green}Jam {$this->cyan}:{$this->yellow} {$this->jam} \n";
		echo "\n";
		echo "{$this->blue}Lintang {$this->green}:{$this->magenta} {$this->lintang} \n";
		echo "{$this->blue}Bujur {$this->green}:{$this->magenta} {$this->bujur} \n";
		echo "{$this->blue}Magnitude {$this->green}:{$this->magenta} {$this->magnitude} \n";
		echo "\n";
		echo "{$this->yellow}Kedalaman {$this->magenta}:{$this->cyan} {$this->kedalaman} \n";
		echo "{$this->yellow}Keterangan {$this->magenta}:{$this->cyan} {$this->keterangan} \n";
		echo "{$this->yellow}Dirasakan {$this->magenta}:{$this->cyan} {$this->dirasakan} \n";
		echo "\n{$this->green}Thanks For using my tools :)\n";

	}

}
$data = new Gempa();
