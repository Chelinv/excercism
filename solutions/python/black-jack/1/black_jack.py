"""Functions to help play and score a game of blackjack.

How to play blackjack:    https://bicyclecards.com/how-to-play/blackjack/
"Standard" playing cards: https://en.wikipedia.org/wiki/Standard_52-card_deck
"""


def value_of_card(card):
    if card in ['J', 'Q', 'K']:
        return 10
    elif card == 'A':
        return 1
    else:
        return int(card)

    
    pass


def higher_card(card_one, card_two):
    value_one = value_of_card(card_one)
    value_two = value_of_card(card_two)
    
    if value_one > value_two:
        return card_one
    elif value_two > value_one:
        return card_two
    else:
        return card_one, card_two

    pass


def value_of_ace(card_one, card_two):
    if card_one == 'A' or card_two == 'A':
        return 1

    total = value_of_card(card_one) + value_of_card(card_two)
    return 11 if total + 11 <= 21 else 1


def is_blackjack(card_one, card_two):
    ten_cards = ['10', 'J', 'Q', 'K']
    # True if one card is 'A' and the other is a ten-card
    return (card_one == 'A' and card_two in ten_cards) or \
           (card_two == 'A' and card_one in ten_cards)

    pass


def can_split_pairs(card_one, card_two):
    def card_value(card):
        if card in ['J', 'Q', 'K']:
            return 10
        elif card == 'A':
            return 11  # Ace is 11 for splitting purposes
        else:
            return int(card)

    return card_value(card_one) == card_value(card_two)


def can_double_down(card_one, card_two):
    total = value_of_card(card_one) + value_of_card(card_two)
    return total in [9, 10, 11]
