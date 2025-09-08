def response(hey_bob: str )->str:
    message = hey_bob.strip()

    if not message:
        return "Fine. Be that way!"

    is_yelling = message.isupper() and any(c.isalpha() for c in message)

    is_question = message.endswith("?")

    if is_yelling and is_question:
        return "Calm down, I know what I'm doing!"
    elif is_yelling:
        return "Whoa, chill out!"
    elif is_question:
        return "Sure."
    else:
        return "Whatever."
