package mysql;

public class ReplaceableAttribute {
	private String name;
	private String value;
	private boolean replcae;

	public ReplaceableAttribute withName(String name) {
		this.name = name;
		return this;

	}

	public  ReplaceableAttribute withValue(String value) {
		this.value = value;
		return this;

	}

	public  ReplaceableAttribute withReplace(boolean replace) {
		this.replcae = replace;
		return this;
	}

	public  String getName() {
		return this.name;
	}

	public  String getValue() {
		return this.value;
	}

	public  boolean getReplace() {
		return this.replcae;
	}

}
