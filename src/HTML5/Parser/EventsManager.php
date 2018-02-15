<?php
namespace Masterminds\HTML5\Parser;

class EventsManager implements EventHandler {

	protected $_listeners;


	public function addListener($listener){
		$this->_listeners[] = $listener;
	}

	protected function processEvent($callback){
		foreach($this->_listeners as $listener){
			$callback($listener);
		}
	}

	/**
	*
	*/
	public function doctype($name, $idType = 0, $id = null, $quirks = false){
		$this->processEvent(function($listener)){
			$listener->doctype($name, $idType, $id, $quirks);
		}
	}

	/**
	 *
	 */
	public function startTag($name, $attributes = array(), $selfClosing = false){
		$this->processEvent(function($listener)){
			$listener->startTag($name, $attributes, $selfClosing);
		}
	}

	/**
	 * An end-tag.
	 */
	public function endTag($name){
		$this->processEvent(function($listener)){
			$listener->endTag($name);
		}
	}

	/**
	 * A comment section (unparsed character data).
	 */
	public function comment($cdata){
		$this->processEvent(function($listener)){
			$listener->comment($data);
		}
	}

	/**
	 * A unit of parsed character data.
	 *
	 * Entities in this text are *already decoded*.
	 */
	public function text($cdata){
		$this->processEvent(function($listener)){
			$listener->text($cdata);
		}
	}

	/**
	 * Indicates that the document has been entirely processed.
	 */
	public function eof(){
		$this->processEvent(function($listener)){
			$listener->eof();
		}
	}

	/**
	 * Emitted when the parser encounters an error condition.
	 */
	public function parseError($msg, $line, $col){
		$this->processEvent(function($listener)){
			$listener->parseError($msg, $line, $col);
		}
	}

	/**
	 * A CDATA section.
	 *
	 * @param string $data
	 *            The unparsed character data.
	 */
	public function cdata($data){
		$this->processEvent(function($listener)){
			$listener->cdata($name, $attributes, $selfClosing);
		}
	}

	/**
	 * This is a holdover from the XML spec.
	 *
	 * While user agents don't get PIs, server-side does.
	 *
	 * @param string $name
	 *            The name of the processor (e.g. 'php').
	 * @param string $data
	 *            The unparsed data.
	 */
	public function processingInstruction($name, $data = null){
		$this->processEvent(function($listener)){
			$listener->processingInstruction($name, $data);
		}
	}


}
