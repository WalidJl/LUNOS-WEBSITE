<?php
	class Forum{
		private $id=null;
		private $Question=null;
		private $Subject=null;
		private $Answers=null;
		private $Date=null;

		////////////////////CUNSTRUCT
		function __construct($Question, $Subject, $Answers){
			$this->Question=$Question;
			$this->Subject=$Subject;
			$this->Answers=$Answers;
		}
		/////////////////////GET
		function getId(){
			return $this->id;
		}
		function getQuestion(){
			return $this->Question;
		}
		function getSubject(){
			return $this->Subject;
		}
		function getAnswers(){
			return $this->Answers;
		}
		///////////////////////SET
		function setQuestion(string $Question){
			$this->Question=$Question;
		}
		function setSubject(string $Subject){
			$this->Subject=$Subject;
		}
		function setAnswers(string $Answers){
			$this->Answers=$Answers;
		}
	}


?>