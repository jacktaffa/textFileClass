<?php
  public class File{
    private $name = "";
    private $file;
    private $tor="r"; //type of reading
    public function __construct($file){
        $this->file = fopen($file, $this->tor) or die("<script>console.log('Impossibile aprire il file')</script>");
    }
    public function setTor($tor){
      $this->tor  = $tor;
      self::closeFile();
      $this->file = fopen($this->name, $tor);
    }
    public function setName($name){
      $this->name  = $name;
      self::closeFile();
      $this->file = fopen($name, $this->tor);
    }
    public function getSize(){
      return filesize($this->name);
    }
    public function getExtension(){
      $ext = explode(".", $this->name);
      return end($ext);
    }

    public function closeFile(){
      fclose($this->file);
    }
    public function readAll(){
      return fread($this->file, self::getSize());
    }
    public function readToByte($size){
      return fread($this->file, $size);
    }
    public function getNextLine(){
      return fgets($this->file);
    }
    public function getNextChar(){
      return fgetc($this->file);
    }
    public function endFile(){
      return feof($this->file);
    }
    public getRows(){
      return file($this->name);
    }
    public numRows(){
      return count(self::getRows);
    }
    public openFile($name, $tor){
      $this->file = fopen($name, $tor);
    }
    public write($txt){
      $old_tor = $this->tor;
      $this->tor="w";
      self::closeFile();
      self::openFile($this->name, $this->tor);
      fwrite($this->file, $txt);
      self::closeFile();
      self::openFile($this->name, $old_tor);
    }
    public appendBefore(){
      $old_tor = $this->tor;
      $this->tor="r+";
      self::closeFile();
      self::openFile($this->name, $this->tor);
      fwrite($this->file, $txt);
      self::closeFile();
      self::openFile($this->name, $old_tor);
    }
    public appendTo(){
      $old_tor = $this->tor;
      $this->tor="a";
      self::closeFile();
      self::openFile($this->name, $this->tor);
      fwrite($this->file, $txt);
      self::closeFile();
      self::openFile($this->name, $old_tor);
    }
    public function __toString(){
      return self::readAll();
    }


  }
?>
