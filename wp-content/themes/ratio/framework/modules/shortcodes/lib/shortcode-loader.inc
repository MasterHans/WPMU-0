<?php
namespace RatioEdge\Modules\Shortcodes\Lib;

use RatioEdge\Modules\Shortcodes\Accordion\Accordion;
use RatioEdge\Modules\Shortcodes\AccordionTab\AccordionTab;
use RatioEdge\Modules\Shortcodes\AdvancedCarousel\AdvancedCarousel;
use RatioEdge\Modules\Shortcodes\Blockquote\Blockquote;
use RatioEdge\Modules\Shortcodes\BlogList\BlogList;
use RatioEdge\Modules\Shortcodes\BlogSlider\BlogSlider;
use RatioEdge\Modules\Shortcodes\Button\Button;
use RatioEdge\Modules\Shortcodes\CallToAction\CallToAction;
use RatioEdge\Modules\Shortcodes\Counter\Countdown;
use RatioEdge\Modules\Shortcodes\Counter\Counter;
use RatioEdge\Modules\Shortcodes\CrossfadeSlider\CrossfadeSlider;
use RatioEdge\Modules\Shortcodes\CrossfadeSlide\CrossfadeSlide;
use RatioEdge\Modules\Shortcodes\CustomFont\CustomFont;
use RatioEdge\Modules\Shortcodes\Dropcaps\Dropcaps;
use RatioEdge\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use RatioEdge\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use RatioEdge\Modules\Shortcodes\GoogleMap\GoogleMap;
use RatioEdge\Modules\Shortcodes\Highlight\Highlight;
use RatioEdge\Modules\Shortcodes\Icon\Icon;
use RatioEdge\Modules\Shortcodes\IconListItem\IconListItem;
use RatioEdge\Modules\Shortcodes\IconWithText\IconWithText;
use RatioEdge\Modules\Shortcodes\ImageGallery\ImageGallery;
use RatioEdge\Modules\Shortcodes\Message\Message;
use RatioEdge\Modules\Shortcodes\NumberedTitle\NumberedTitle;
use RatioEdge\Modules\Shortcodes\OrderedList\OrderedList;
use RatioEdge\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use RatioEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use RatioEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use RatioEdge\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use RatioEdge\Modules\Shortcodes\PricingTables\PricingTables;
use RatioEdge\Modules\Shortcodes\PricingTable\PricingTable;
use RatioEdge\Modules\Shortcodes\Process\ProcessHolder;
use RatioEdge\Modules\Shortcodes\Process\ProcessItem;
use RatioEdge\Modules\Shortcodes\ProgressBar\ProgressBar;
use RatioEdge\Modules\Shortcodes\SectionSubtitle\SectionSubtitle;
use RatioEdge\Modules\Shortcodes\Separator\Separator;
use RatioEdge\Modules\Shortcodes\SocialShare\SocialShare;
use RatioEdge\Modules\Shortcodes\Tabs\Tabs;
use RatioEdge\Modules\Shortcodes\Tab\Tab;
use RatioEdge\Modules\Shortcodes\Tooltip\Tooltip;
use RatioEdge\Modules\Shortcodes\Team\Team;
use RatioEdge\Modules\Shortcodes\UnorderedList\UnorderedList;
use RatioEdge\Modules\Shortcodes\VerticalSplitSlider\VerticalSplitSlider;
use RatioEdge\Modules\Shortcodes\VerticalSplitSliderContentItem\VerticalSplitSliderContentItem;
use RatioEdge\Modules\Shortcodes\VerticalSplitSliderLeftPanel\VerticalSplitSliderLeftPanel;
use RatioEdge\Modules\Shortcodes\VerticalSplitSliderRightPanel\VerticalSplitSliderRightPanel;
use RatioEdge\Modules\Shortcodes\VideoButton\VideoButton;
use RatioEdge\Modules\Shortcodes\ShopMasonry\ShopMasonry;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new AdvancedCarousel());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new BlogSlider());
		$this->addShortcode(new Button());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new CrossfadeSlider());
		$this->addShortcode(new CrossfadeSlide());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new Message());
		$this->addShortcode(new NumberedTitle());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new ProcessItem());
		$this->addShortcode(new Separator());
		$this->addShortcode(new SectionSubtitle());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new Team());
		$this->addShortcode(new Tooltip());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new VerticalSplitSlider());
		$this->addShortcode(new VerticalSplitSliderLeftPanel());
		$this->addShortcode(new VerticalSplitSliderRightPanel());
		$this->addShortcode(new VerticalSplitSliderContentItem());
		$this->addShortcode(new ShopMasonry());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();